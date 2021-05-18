<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductSizeController extends Controller
{
    //
    // public function addProductSize(){
    //    $product=Product::find(5);
    //    dd($product->sizes);
    //    foreach($product->sizes as $size){
    //            echo $size->id;
    //            echo "<br>";
    //             echo $size->name;
    //             echo "<br>";
    //    }
        

       
        
    //     // $product->sizes()->attach([2=>['quantity'=>10],3=>['quantity'=>20],4=>['quantity'=>20],5=>['quantity'=>20]]);
    // }
    public function index($product_id){
        $data=[];
        $product_sizes=Product::find($product_id);
        $product_sizes=$product_sizes->sizes;
        $data['product_sizes']=$product_sizes;
        $data['product_id']=$product_id;
        // dd($data);
        return view('admin.product_sizes.index',$data);
    }
    public function create($product_id){
        $data=[];
        $sizes=Size::pluck('name','id');
        $data['product_id']=$product_id;
        $data['sizes']=$sizes;
        return view('admin.product_sizes.create',$data);
    }
    public function store(Request $request,$product_id){
        $product=Product::find($product_id);
        
        // dd($dataInsert);
        DB::beginTransaction();
        try{
            $product->sizes()->attach($request->size_id,['quantity'=>$request->quantity]);
            DB::commit();
            return redirect()->route('admin.product.size.index',['product_id'=>$product_id])->with('success','Insert success product size');
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
    public function edit($product_id,$size_id)
    {   
        $data=[];
        $product=Product::find($product_id);
        $product_size=$product->sizes->find($size_id);
        $sizes=Size::pluck('name','id');
        $data['sizes']=$sizes;
        $data['product_size']=$product_size;
        // dd($data);
        return view('admin.product_sizes.edit',$data);
    }

    public function update(Request $request, $product_id,$size_id)
    {
        DB::beginTransaction();
        try{
            $product=Product::find($product_id);
            $product->sizes()->updateExistingPivot($size_id, ['quantity'=>$request->quantity]);
            DB::commit();
            return redirect()->route('admin.product.size.index',['product_id'=>$product_id])->with('success','Update product size success');
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
    
    public function destroy($product_id,$size_id)
    {      
        DB::beginTransaction();
        try{
            
            $product=Product::find($product_id);
            $product->sizes()->detach($size_id);
            DB::commit();
            return redirect()->route('admin.product.size.index',['product_id'=>$product_id])->with('success','Delete product price success');
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
}
