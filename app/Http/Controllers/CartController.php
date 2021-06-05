<?php

namespace App\Http\Controllers;

use App\Mail\SendInforOrder;
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
use phpDocumentor\Reflection\Types\Null_;

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
        $discount=$request->discount;
        $promotion_id=$request->promotion_id;

        $quantity_product_size=DB::table('product_size')->select('quantity')->where('product_id',$product_id)->where('size_id',$id_size)->first();
        if($quantity <= $quantity_product_size->quantity){
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
            $data['options']['discount']=$discount;
            $data['options']['promotion_id']=$promotion_id;
            // dd($data);
            Cart::add($data);
            // Cart::destroy();
            // dd(Cart::content());
            return redirect()->route('view_cart');
        }else{
            
            $message='Only '. $quantity_product_size->quantity . ' products in stock';
            return redirect()->back()->with('message',$message);
        }
    }

    public function updateCart(Request $request){
        
        $rowId=$request->rowId;
        $quantity=$request->quantity;
        $cart=Cart::get($rowId);
        $size_id=Size::select('id')->where('name',$cart->options->size)->first();
        $quantity_product_size=DB::table('product_size')->select('quantity')->where('product_id',$cart->id)->where('size_id',$size_id->id)->first();
        if($quantity <=$quantity_product_size->quantity){
            try{

                Cart::update($rowId, $quantity);
                return response()->json('message','update cart success');
            }catch(\Exception $ex){
                return response()->json(['message' => $ex->getMessage()]);
            }
        }else{
            $message='Only '. $quantity_product_size->quantity . ' products in stock';
            return response()->json('message',$message);
        }
        
        // return redirect()->route('view_cart');
    }

    public function removeItemCart($id){
        Cart::remove($id);
        return redirect()->back();

    }

    // Send code xác thực check out
    public function sendVerifyCode(Request $request)
    {
        // send code to verify Order
        // check exist send code ?
        $userId = Auth::id();
        $email = Auth::user()->email;
        $currentDate = date('Y-m-d H:i:s');
        $code=random_int(100000, 999999);

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
                'code'  => $code,
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
            session(['step_by_step' => 1]);

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

        $email = Auth::user()->email;
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
            // dd($data_order);
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
                        if($cart->options->promotion_id != null){
                            $promotion_id=$cart->options->promotion_id;
                        }else{
                            $promotion_id=Null;
                        }
                        $data_order_detail=[
                            'order_id'=>$orderID,
                            'product_id'=>$product->id,
                            'price_id'=>$price_id,
                            'size_id'=>$size_id,
                            'promotion_id'=>$promotion_id,
                            'quantity'=>$quantity,
                        ];
                        // print_r($data_order_detail);
                        // dd($data_order_detail);
                        OrderDetail::create($data_order_detail);    
                    }
                }
                DB::commit();  
                // dd($order_details);
                // $data['order_id']=$orderID;
                Cart::destroy();
                $request->session()->forget(['step_by_step']);

                $order_details = DB::table('order_detail')
                ->join('products', 'order_detail.product_id', '=', 'products.id')
                ->join('orders', 'order_detail.order_id', '=', 'orders.id')
                ->join('sizes', 'order_detail.size_id', '=', 'sizes.id')
                ->join('prices', 'order_detail.price_id', '=', 'prices.id')
                ->leftjoin('promotions','order_detail.promotion_id','=','promotions.id')
                ->where('order_id',$orderID)->select('products.thumbnail','products.name as product_name', 'sizes.name as size_name', 'prices.price','order_detail.quantity','promotions.discount')
                ->get();
                $info_order=Order::join('users','orders.user_id','=','users.id')->where('orders.id',$orderID)->select('orders.id','users.name','users.address','users.phone','orders.created_at')->first();
                $data['info_order']=$info_order;
                $data['order_details']=$order_details;

                 // send infor order to email
                 Mail::to($email)->send(new SendInforOrder($data));
                 
                return redirect()->route('view_order_complete')->with('success','Cảm ơn bạn đã đặt hàng!!!');
            }catch(\Exception $ex){
                return redirect()->back()->with('error',$ex->getMessage());
            }
        }
    }

    // public function test_view_order(){
    //     $data=[];
    //     $categories_menu = Category::where('parent_id', '=', 0)->get();
    //     $data['categories']=$categories_menu;

    //     $data_view_order=[];
    //     $order_details = DB::table('order_detail')
    //         ->join('products', 'order_detail.product_id', '=', 'products.id')
    //         ->join('orders', 'order_detail.order_id', '=', 'orders.id')
    //         ->join('sizes', 'order_detail.size_id', '=', 'sizes.id')
    //         ->join('prices', 'order_detail.price_id', '=', 'prices.id')
    //         ->leftjoin('promotions','order_detail.promotion_id','=','promotions.id')
    //         ->where('order_id',3)->select('products.thumbnail','products.name as product_name', 'sizes.name as size_name', 'prices.price','order_detail.quantity','promotions.discount')
    //         ->get();
    //         // dd($order_details);

    //     // dd($order_details);
    //        $data['order_id']=3;
    //        $data['order_details']=$order_details;
    //     //    dd($data);

    //         return view('info_order',$data);
    // }
    public function view_send_mail(){
        $data_view_order=[];
        $order_details = DB::table('order_detail')
            ->join('products', 'order_detail.product_id', '=', 'products.id')
            ->join('orders', 'order_detail.order_id', '=', 'orders.id')
            ->join('sizes', 'order_detail.size_id', '=', 'sizes.id')
            ->join('prices', 'order_detail.price_id', '=', 'prices.id')
            ->leftjoin('promotions','order_detail.promotion_id','=','promotions.id')
            ->where('order_id',3)->select('products.thumbnail','products.name as product_name', 'sizes.name as size_name', 'prices.price','order_detail.quantity','promotions.discount')
            ->get();
            $info_order=Order::join('users','orders.user_id','=','users.id')->where('orders.id',3)->select('orders.id','users.name','users.address','users.phone','orders.created_at')->first();
            $data['info_order']=$info_order;
           $data['order_details']=$order_details;
        //    dd($data);
        return view('emails.orders.order',$data);
        
    }
    public function order_complete(){
        $data=[];
        $categories_menu = Category::where('parent_id', '=', 0)->get();
        $data['categories']=$categories_menu;
        return view('carts.checkout_complete',$data);
    }
}
