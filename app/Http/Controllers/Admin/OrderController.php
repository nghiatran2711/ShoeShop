<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function list_order(){
        $data=[];
        $orders=Order::get();
        $data['orders']=$orders;


        return view('admin.orders.index',$data);
    }
    public function order_detail($id){
        $data=[];
       
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
        return view('admin.orders.order_detail',$data);
    }
    public function confirm_order($id){
        $order=Order::find($id);
        $order->status=2;
        try{
            $order->save();
            return redirect()->route('admin.order.list_order')->with('success',"Duyệt đơn hàng $id thành công");
        }catch(\Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
}
