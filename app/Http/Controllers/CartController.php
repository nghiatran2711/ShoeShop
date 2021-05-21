<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
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
        // Cart::add($data);
        // Cart::destroy();
        dd(Cart::content());
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
}
