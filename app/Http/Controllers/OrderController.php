<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function view_order_history(){
        // echo "hahahahahah";
        $data=[];
        $categories_menu = Category::where('parent_id', '=', 0)->get();
        $data['categories']=$categories_menu;
        $customer_id=Auth::user()->id;
        $history_orders=Order::where('user_id',$customer_id)->get();
        $data['history_orders']=$history_orders;
        return view('order.history_order',$data);
    }
    public function order_detail($id){
        $data=[];
        $categories_menu = Category::where('parent_id', '=', 0)->get();
        $data['categories']=$categories_menu;
        $order=Order::find($id);
        // $customer=User::select('name','email')->find($order->user_id);
        $order_details = DB::table('order_detail')
        ->join('products', 'order_detail.product_id', '=', 'products.id')
        ->join('orders', 'order_detail.order_id', '=', 'orders.id')
        ->join('sizes', 'order_detail.size_id', '=', 'sizes.id')
        ->join('prices', 'order_detail.price_id', '=', 'prices.id')
        ->leftjoin('promotions','order_detail.promotion_id','=','promotions.id')
        ->where('order_id',$id)->select('products.thumbnail','products.name as product_name', 'sizes.name as size_name', 'prices.price','order_detail.quantity','promotions.discount')
        ->get();
        $data['order_id']=$id;
        $data['order_details']=$order_details;
        return view('order.order_detail',$data);
    }

    public function destroy_order($id){
        $order=Order::find($id);
        $order->status=3;
        try{
            $order->save();
            return redirect()->route('view_order_history')->with('success',"Huỷ đơn hàng $id thành công");
        }catch(\Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
}
