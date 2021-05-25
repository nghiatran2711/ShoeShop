<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //method: get
        $brands = Brand::paginate(4);
        // dd($categories);
        return view('admin.brands.index', ['brands' => $brands]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //method:get
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        //method:post     
        $brandInsert=[
            'name'=>$request->name,
        ];
        // dd($brandInsert);
        DB::beginTransaction();
        
        try {
            
            Brand::create($brandInsert);

            // insert into data to table brand (successful)
            DB::commit();
            return redirect()->route('admin.brand.index')->with('success', 'Insert into data to Brand Successful.');
        } catch (\Exception $ex) {
            // insert into data to table brand (fail)
            DB::rollBack();
            return redirect()->route('admin.brand.index')->with('error', $ex->getMessage());
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
        //method: get
        $brandDetails = Brand::find($id);

        // insert into data to table brand (successful)
        return view('admin.brand.details',['brandDetails'=>$brandDetails]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //method: get

        $data = [];
        $brand = Brand::findOrFail($id);
        $data['brand'] = $brand;

        return view('admin.brands.edit', $data);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, $id)
    {
        //method:PUT
           
        DB::beginTransaction();
        try {
            Brand::where('id',$id)->update([
                'name'=>$request->name,
            ]);     
            
            // update data to table brand (successful)
            DB::commit();
            return redirect()->route('admin.brand.index')->with('success','Update data brand success');
        } catch (\Exception $ex) {
            // update data to table brand (fail)
            DB::rollBack();
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
        //method: Delete
        
        DB::beginTransaction();
        try {
            $brand= Brand::find($id);
            $brand->delete();   
            // Delete data to table brand (successful)
            DB::commit();
            return redirect()->route('admin.brand.index')->with('success','Delete data brand success');
        } catch (\Exception $ex) {
            // insert into data to table brand (fail)
            DB::rollBack();
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
    public function search(Request $request){
        $data = [];
        
        $brands = Brand::where('name', 'LIKE', '%' . $request->input('keyword') . '%');
        $brands=$brands->paginate(4);
        $data['brands'] = $brands;

        return view('admin.brands.index', $data);
    }
    // public function search_ajax(Request $request){
    //     $data = [];
    //     $categoryName = $request->category_name;
    //     if (!empty($categoryName)) {
    //         $categories = Category::where('category_name', 'LIKE', '%' . $categoryName . '%')
    //             ->get();
    //     } else {
    //         $categories = Category::get();
    //     }

    //     $data['categories'] = $categories;
    //     return response()->json($data);
    // }
}
