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
    public function index()
    {
        $data=[];
        $promotions=Promotion::get();
        $data['promotions']=$promotions;
        return view('admin.promotions.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //method:get
        return view('admin.promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $dataInsert=[
            'discount'=>$request->discount,
            'begin_date'=>$request->begin_date,
            'end_date'=>$request->end_date,
            'status'=>$request->status
        ];
        
        DB::beginTransaction();
        try{
            Promotion::create($dataInsert);
            DB::commit();
            return redirect()->route('admin.promotion.index')->with('success','Insert promotion success');
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
    public function edit($promotion_id)
    {   
        $data=[];
        $promotion=Promotion::findOrFail($promotion_id);
        $data['promotion']=$promotion;
        return view('admin.promotions.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$promotion_id)
    {
        $promotion= Promotion::find($promotion_id);
        $promotion->discount=$request->discount;
        $promotion->begin_date=$request->begin_date;
        $promotion->end_date=$request->end_date;
        $promotion->status=$request->status;
        
        DB::beginTransaction();
        try{
            $promotion->save();
            DB::commit();
            return redirect()->route('admin.promotion.index')->with('success','Update promotion success');
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
    public function destroy($promotion_id)
    {
        DB::beginTransaction();
        try{
            Promotion::findOrFail($promotion_id)->delete();
            DB::commit();
            return redirect()->route('admin.promotion.index')->with('success','Delete promotion success');
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
}
