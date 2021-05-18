<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($product_id)
    {
        $data=[];
        $promotions=Promotion::where('product_id',$product_id)->get();
        $product=Product::select('id','name')->where('id',$product_id)->first();
        $data['promotions']=$promotions;
        $data['product']=$product;
        return view('admin.promotions.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        //method:get
        $data=[];
        $data['product_id']=$product_id;
        return view('admin.promotions.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$product_id)
    {
       
        $dataInsert=[
            'discount'=>$request->discount,
            'product_id'=>$product_id,
            'begin_date'=>$request->begin_date,
            'end_date'=>$request->end_date,
            'status'=>$request->status
        ];
        
        DB::beginTransaction();
        try{
            Promotion::create($dataInsert);
            DB::commit();
            return redirect()->route('admin.product.promotion.index',['product_id'=>$product_id])->with('success','Insert promotion success');
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
    public function edit($product_id,$promotion_id)
    {   
        $data=[];
        $promotion=Promotion::findOrFail($promotion_id);
        $data['promotion']=$promotion;
        $data['product_id']=$product_id;
        return view('admin.promotions.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id,$promotion_id)
    {
        $promotion= Promotion::find($promotion_id);
        $promotion->discount=$request->discount;
        $promotion->product_id=$product_id;
        $promotion->begin_date=$request->begin_date;
        $promotion->end_date=$request->end_date;
        $promotion->status=$request->status;
        
        DB::beginTransaction();
        try{
            $promotion->save();
            DB::commit();
            return redirect()->route('admin.product.promotion.index',['product_id'=>$product_id])->with('success','Update promotion success');
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
    public function destroy($product_id,$promotion_id)
    {
        DB::beginTransaction();
        try{
            Promotion::findOrFail($promotion_id)->delete();
            DB::commit();
            return redirect()->route('admin.product.promotion.index',['product_id'=>$product_id])->with('success','Delete promotion success');
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
}
