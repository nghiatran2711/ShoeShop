<?php

namespace App\Http\Controllers;

use App\Mail\SendVerifyCode;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderVerify;
use App\Models\Price;
use App\Models\Product;
use App\Models\Size;
use App\Utils\CommonUtil;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    public function viewCart(){
        $data=[];
        $categories_menu = Category::where('parent_id', '=', 0)->get();
        $data['categories']=$categories_menu;
        return view('cart',$data);
    }
    public function addCart(Request $request){
        // lấy thông tin từ form
        $product_id=$request->product_id;
        $quantity=$request->qty;
        $id_size=$request->product_size;

        $data=[];
        $product=Product::find($product_id);
        $size=$product->sizes->find($id_size)->name;

        $data['id']=$product->id;
        $data['name']=$product->name;
        $data['qty']=$quantity;
        $data['price']=$product->latestPrice()->price ? $product->latestPrice()->price : 0;
        $data['weight']=0;
        $data['options']['size']=$size;
        $data['options']['thumbnail']=$product->thumbnail;
        Cart::add($data);
        // Cart::destroy();
        // dd(Cart::content());
        return redirect()->route('view_cart');
    }

    public function updateCart(Request $request){
        $rowId=$request->rowId;
        $quantity=$request->quantity;
        try{

            Cart::update($rowId, $quantity);
            return response()->json('message','update cart success');
        }catch(\Exception $ex){
            return response()->json(['message' => $ex->getMessage()]);
        }
        
        // return redirect()->route('view_cart');
    }

    public function removeItemCart($id){
        Cart::remove($id);
        return redirect()->route('view_cart');

    }

    // Send code xác thực check out
    public function sendVerifyCode(Request $request)
    {
        // send code to verify Order
        // check exist send code ?
        $userId = Auth::id();
        $email = Auth::user()->email;
        $currentDate = date('Y-m-d H:i:s');
        $dateSubtract15Minutes = date('Y-m-d H:i:s', (time() - 60 * 15)); // current - 15 minutes
        Log::info('dateSubtract15Minutes');
        Log::info($dateSubtract15Minutes);
        $orderVerify = OrderVerify::where('user_id', $userId)
            ->whereBetween('expire_date', [$dateSubtract15Minutes, $currentDate])
            ->where('status', OrderVerify::STATUS[0])
            ->first();

        if (!empty($orderVerify)) { // already sent code and this code is available
            return response()->json(['message' => 'We sent code to your email about 15 minutes ago. Please check email to get code.']);
        } else { // not send code
            $dataSave = [
                'user_id' => $userId,
                'status'  => OrderVerify::STATUS[0], // default 0
                'code'  => CommonUtil::generateUUID(),
                'expire_date'  => $currentDate,
            ];
            DB::beginTransaction();

            try {
                OrderVerify::create($dataSave);

                // commit insert data into table
                DB::commit();

                // send code to email
                Mail::to($email)->send(new SendVerifyCode($dataSave));

                return response()->json(['message' => 'We sent code to email. Please check email to get code.']);
            } catch (\Exception $exception) {
                // rollback data and dont insert into table
                DB::rollBack();

                return response()->json(['message' => $exception->getMessage()]);
            }
        }
    }
    public function confirmVerifyCode(Request $request){
        $code = $request->code;
        $userId = Auth::id();

        $orderVerify = OrderVerify::where('code', $code)
            ->where('user_id', $userId)
            ->where('status', OrderVerify::STATUS[0])
            ->first();
        //  validate code

        DB::beginTransaction();

        try {
            $orderVerify->status = OrderVerify::STATUS[1];
            $orderVerify->save();

            DB::commit();

            // add step by step to SESSION
            // session(['step_by_step' => 2]);

            return response()->json(['message' => 'Confirmed code is OK.']);
        } catch (\Exception $exception) {
            DB::rollBack();

            return response()->json(['message' => $exception->getMessage()]);
        }
    }
    public function checkout(){ 
        $data=[];
        $categories_menu = Category::where('parent_id', '=', 0)->get();
        $data['categories']=$categories_menu;
        return view('carts.checkout',$data);
    }
    public function checkoutComplete(Request $request){

        $data=[];
        $categories_menu = Category::where('parent_id', '=', 0)->get();
        $data['categories']=$categories_menu;

        $carts=Cart::content();
        // dd($carts);
        $type_payment=$request->payment_type;
        $data_order=[];
        $data_order_detail=[];

        if($type_payment==1){
            $data_order=[
                'user_id' => Auth()->id(),
                'status' => Order::STATUS[0],
            ];
            try{
                DB::beginTransaction();
                $order=Order::create($data_order);
                $orderID=$order->id;
                if(!empty($carts)){
                    foreach($carts as $cart){
                        $product=Product::where('id',$cart->id)->first();
                        $price_id=$product->latestPrice()->id;
                        $size_id=$product->sizes->where('name',$cart->options->size)->first()->id;
                        $quantity=$cart->qty;
                        $data_order_detail=[
                            'order_id'=>$orderID,
                            'product_id'=>$product->id,
                            'price_id'=>$price_id,
                            'size_id'=>$size_id,
                            'quantity'=>$quantity,
                        ];
                        // print_r($data_order_detail);
                        OrderDetail::create($data_order_detail);    
                    }
                }
                DB::commit();
                $data_view_order=[];
                $order_details=OrderDetail::where('order_id',$orderID)->get();
                // dd($order_details);
                $data['order_id']=$orderID;
                foreach($order_details as $order_detail){
                    $product=Product::where('id',$order_detail->product_id)->first();
                    $price=Price::where('id',$order_detail->price_id)->first();
                    $size=Size::where('id',$order_detail->size_id)->first();
                    $quantity=$order_detail->quantity;
                    $data_order_detail=[
                        'thumbnail'=>$product->thumbnail,
                        'size'=>$size->name,
                        'price'=>$price->price,
                        'quantity'=>$quantity
                    ];
                    $data_view_order[]=$data_order_detail;
                }
                return view('info_order',$data,['data_view_order'=>$data_view_order])->with('success','Cảm ơn bạn đã đặt hàng!!!');
            }catch(\Exception $ex){
                return redirect()->back()->with('error',$ex->getMessage());
            }
        }
    }
    public function test_view_order(){
        $data=[];
        $categories_menu = Category::where('parent_id', '=', 0)->get();
        $data['categories']=$categories_menu;

        $data_view_order=[];
        $order_details=OrderDetail::where('order_id',6)->get();
        // dd($order_details);
           $data['order_id']=6;
                foreach($order_details as $order_detail){
                    $product=Product::where('id',$order_detail->product_id)->first();
                    $price=Price::where('id',$order_detail->price_id)->first();
                    $size=Size::where('id',$order_detail->size_id)->first();
                    $quantity=$order_detail->quantity;
                    $data_order_detail=[
                        'thumbnail'=>$product->thumbnail,
                        'size'=>$size->name,
                        'price'=>$price->price,
                        'quantity'=>$quantity
                    ];
                    $data_view_order[]=$data_order_detail;
                }
                return view('info_order',$data,['data_view_order'=>$data_view_order]);
    }
}
