<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data=[];
        $prices=Price::where('product_id',$id)->get();
        $product=Product::select('id','name')->where('id',$id)->first();
        $data['prices']=$prices;
        $data['product']=$product;
        return view('admin.prices.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //method:get
        $data=[];
        $data['product_id']=$id;
        return view('admin.prices.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $dataInsert=[
            'price'=>$request->price,
            'product_id'=>$id,
            'begin_date'=>$request->begin_date,
            'end_date'=>$request->end_date,
            'status'=>$request->status
        ];
        
        DB::beginTransaction();
        try{
            Price::create($dataInsert);
            DB::commit();
            return redirect()->route('admin.product.price.index',['product_id'=>$id])->with('success','Insert Price success');
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with('error',$ex->getMessage());
        }
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id,$price_id)
    {   
        $data=[];
        $price=Price::findOrFail($price_id);
        $data['price']=$price;
        $data['product_id']=$product_id;
        return view('admin.prices.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id,$price_id)
    {
        $price= Price::find($price_id);
        $price->price=$request->price;
        $price->product_id=$product_id;
        $price->begin_date=$request->begin_date;
        $price->end_date=$request->end_date;
        $price->status=$request->status;
        
        DB::beginTransaction();
        try{
            $price->save();
            DB::commit();
            return redirect()->route('admin.product.price.index',['product_id'=>$product_id])->with('success','Update price success');
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id,$price_id)
    {
        DB::beginTransaction();
        try{
            Price::findOrFail($price_id)->delete();
            DB::commit();
            return redirect()->route('admin.product.price.index',['product_id'=>$product_id])->with('success','Delete price success');
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
}
