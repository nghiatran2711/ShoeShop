<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductPromotion;
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
        $promotions=Promotion::paginate(10);
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
        $data = [];

        // get list product
        $products = Product::pluck('name', 'id')
            ->toArray();
        $data['products'] = $products;

        /**
         * Get End Date Latest
         * 
         * @beginDate defalt Current Date
         */
        $beginDate = date('Y-m-d 00:00:00');
        $promotionLatest = Promotion::orderBy('end_date', 'desc')
            ->first();
            // dd($promotionLatest);
        if (!empty($promotionLatest->end_date)) {
            $endDate = $promotionLatest->end_date;
            $beginDate = date('Y-m-d 00:00:00', strtotime($endDate . ' + 1 days'));
        }
        $data['beginDate'] = $beginDate;

        return view('admin.promotions.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        /**
         * Prepare Data to Save into DB
         * 
         * @param name string
         * @param discount integer (10, 20, ...) => 10%, 20%, ...
         * @param begin_date datetime 2021-05-31 00:00:00
         * @param end_date datetime 2021-12-31 23:59:59
         * @param quantity integer (10, 100, 1000, ...)
         * @param status boolean (0 | 1) => default 1
         */
        $dataInsert = [
            'name' => $request->name,
            'quantity' => $request->quantity,
            'discount' => $request->discount,
            'begin_date' => date('Y-m-d 00:00:00', strtotime($request->begin_date)),
            'end_date' => date('Y-m-d 23:59:59', strtotime($request->end_date)),
            'status' => $request->status,
        ];

        DB::beginTransaction();

        try {
            // insert into table promotions
            $promotion = Promotion::create($dataInsert);

            // save data for table product_promotion
            /**
             * Get List Product will Use Promotion
             */
            if (!empty($request->list_product)) {
                $products = $request->list_product;
                foreach ($products as $productId) {
                    ProductPromotion::create([
                        'product_id' => $productId,
                        'promotion_id' => $promotion->id,
                    ]);
                }
            }

            DB::commit();

            // success
            return redirect()->route('admin.promotion.index')->with('success', 'Insert successful!');
        } catch (\Exception $ex) {
            DB::rollback();

            return redirect()->back()->with('error', $ex->getMessage());
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
        $data = [];

        // get promotion by $id
        $promotion = Promotion::findOrFail($id);
        $data['promotion'] = $promotion;

        // get list product
        $products = Product::pluck('name', 'id')
            ->toArray();
        $data['products'] = $products;

        // get list product save into table product_promotion
        $listProductPromotion = ProductPromotion::where('promotion_id', $id)
            ->pluck('product_id')
            ->toArray();
        $data['listProductPromotion'] = $listProductPromotion;

        return view('admin.promotions.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        // define variable
        $data = [];

        // get promotion by $id
        $promotion = Promotion::findOrFail($id);
        $data['promotion'] = $promotion;
        // get list product
        $products = Product::pluck('name', 'id')
            ->toArray();
        $data['products'] = $products;

        // // get list product save into table product_promotion
        $listProductPromotion = ProductPromotion::where('promotion_id', $id)
            ->pluck('product_id')
            ->toArray();
        $data['listProductPromotion'] = $listProductPromotion;

        return view('admin.promotions.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $promotion = Promotion::findOrFail($id);

        /**
         * Update data for table promotions
         * 
         * @param name string
         * @param discount integer (10, 20, ...) => 10%, 20%, ...
         * @param begin_date datetime 2021-05-31 00:00:00
         * @param end_date datetime 2021-12-31 23:59:59
         * @param quantity integer (10, 100, 1000, ...)
         * @param status boolean (0 | 1) => default 1
         */

        $promotion->name = $request->name;
        $promotion->discount = $request->discount;
        $promotion->quantity = $request->quantity;
        $promotion->begin_date = date('Y-m-d 00:00:00', strtotime($request->begin_date));
        $promotion->end_date = date('Y-m-d 23:59:59', strtotime($request->end_date));
        $promotion->status = $request->status;
        
         /**
         * get list product saved in table product_promotion (on Database)
         * 
         * get list product receive from Form request
         * 
         * compare between 2 array to an array $listProductPromotionDiff
         */
        // 
        $listProductPromotion = ProductPromotion::where('promotion_id', $id)
            ->pluck('product_id')
            ->toArray();
        
        $products = !empty($request->list_product) ? $request->list_product : [];
        $listProductPromotionDiff = array_diff($listProductPromotion, $products);

        DB::beginTransaction();

        try {
            // Commit update data for table promotions
            $promotion->save();

            // save data for table product_promotion
            /**
             * Get List Product will Use Promotion
             */
            if (!empty($products)) {
                foreach ($products as $productId) {
                    ProductPromotion::create([
                        'product_id' => $productId,
                        'promotion_id' => $promotion->id,
                    ]);
                }
            }

            DB::commit();

            // delete record is Difference $listProductPromotionDiff
            if (!empty($listProductPromotionDiff)) {
                foreach ($listProductPromotionDiff as $productId) {
                    ProductPromotion::where('promotion_id', $id)
                        ->where('product_id', $productId)
                        ->delete();
                }
            }

            // success
            return redirect()->route('admin.promotion.index')->with('success', 'Update Promotion successful!');
        } catch (\Exception $ex) {
            DB::rollback();

            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            // get product by $id
            $product = Promotion::findOrFail($id);

            /**
             * Delete record into table promotions
             * 
             * @param id = $id
             */
            $product->delete();

            DB::commit();

            // success
            return redirect()->route('admin.promotion.index')->with('success', 'Delete Promotion Successful!');
        } catch (\Exception $ex) {
            DB::rollback();

            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
