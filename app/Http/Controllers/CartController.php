<?php

namespace App\Http\Controllers;

use App\Mail\SendVerifyCode;
use App\Models\Category;
use App\Models\OrderVerify;
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
        Cart::update($rowId, $quantity);
        return redirect()->route('view_cart');
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
}
