<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailPromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=[];
        $product_promotions=DB::table('product_promotion')->get()->toArray();
        $data['product_promotions']=$product_promotions;

        $currentDate = date('Y-m-d');
        $list_products = DB::table('products')
            ->join('product_promotion', 'products.id', '=', 'product_promotion.product_id')
            ->join('promotions', 'product_promotion.promotion_id', '=', 'promotions.id')
            ->join('prices','products.id','=','prices.product_id')
            ->where('promotions.begin_date','<=',$currentDate )->where('promotions.end_date','>=',$currentDate)
            ->get();
            dd($list_products);
            
        // foreach ($list_products as $key => $value) {
        //     echo $value->latestPrice->price;
        // }
        // dd($data);
        // return view('admin.promotion_details.list_promotion_detail',$data);
       
            // $data=[];
            // $currentDate = date('Y-m-d');

            // // dd($currentDate);
            // $product_promotion=Product::find(1);
            // $product_sizes=$product_promotion->promotions;
            // $discount=[];
            // // dd($product_sizes);
            // foreach ($product_sizes as $key => $value) {
            //    if($value->begin_date<=$currentDate && $value->end_date>=$currentDate){
            //         if(!empty($value->discount)){
            //             $discount=$value->discount;
            //         }
            //    }    
            // }
            // dd($discount);
            
            
            // dd($discount);
            // $data['product_sizes']=$product_sizes;
           
            return view('admin.promotion_details.list_promotion_detail',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
