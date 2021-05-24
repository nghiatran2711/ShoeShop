<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    private const FOLDER_UPLOAD_PRODUCT_THUMBNAIL = 'products/thumbnails';
    private const FOLDER_UPLOAD_PRODUCT_IMAGE = 'product_images';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=[];
        $categories = Category::where('parent_id', '=', 0)->get();
        $products=Product::paginate(10);
        $data['products']=$products;
        $data['categories']=$categories;
        return view('admin.products.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data=[];
        $categories = Category::where('parent_id', '=', 0)->get();
        $brands=Brand::pluck('name','id');
        // dd($categories);
        $data['categories']=$categories;
        $data['brands']=$brands;
        return view('admin.products.create',$data);
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
        // dd($request->all());
        $thumbnailPath=null;
        if($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()){
            // Nếu có thì thục hiện lưu trữ file vào public/products/thumbnail
            $image = $request->file('thumbnail');
            $extension = $request->thumbnail->extension();
            $extension = strtolower($extension); // convert string to lowercase
            $fileName = 'thumbnail_' . time() . '.' . $extension;

            // upload file to server
            $image->move(self::FOLDER_UPLOAD_PRODUCT_THUMBNAIL, $fileName);
            
            // set filename
            $thumbnailPath = self::FOLDER_UPLOAD_PRODUCT_THUMBNAIL . '/' . $fileName;
        }

        $files=$request->url;
        $listProductImages=[];
            if(!empty($files)){
                foreach ($files as $file) {
                    $extension = $file->extension();
                    $extension = strtolower($extension); // convert string to lowercase
                    $fileName = 'image_' . time() . rand() . '.' . $extension;

                    // upload file to server
                    $file->move(self::FOLDER_UPLOAD_PRODUCT_IMAGE, $fileName);
                    //add url image into array
                    $listProductImages[]=self::FOLDER_UPLOAD_PRODUCT_IMAGE . '/' . $fileName;;
                }
            }
        

        $dataInsert=[
            'name'=>$request->name,
            'description'=>$request->description,
            'thumbnail'=>$thumbnailPath,
            'category_id'=>$request->category_id,
            'brand_id'=>$request->brand_id,
            'is_feature'=>$request->is_feature,
            'status'=>$request->status,
            
        ];
        DB::beginTransaction();
        try{
            //Insert product into table products
            $product=Product::create($dataInsert);

            //Insert content into table product_details
            if(!empty($request->content)){
                $productDetail= new ProductDetail([
                    'content'=>$request->content,
                ]);
                $product->product_detail()->save($productDetail);
            }
            // insert data for table product_images
            if (!empty($listProductImages)) {
                foreach($listProductImages as $url){
                    $dataProductImage=[
                        'url'=>$url,
                        'product_id'=>$product->id,
                    ];
                    ProductImage::create($dataProductImage);
                   
                }
            }
            DB::commit();
            return redirect()->route('admin.product.index')->with('success','Insert product success!!!');

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
        $data=[];
        $categories=Category::where('parent_id','<>','0')->pluck('name','id');
        $brands=Brand::pluck('name','id');
        $product=Product::with('product_detail')->with('product_images')->findOrFail($id);
        $data['categories']=$categories;
        $data['product']=$product;
        $data['brands']=$brands;
        
        // dd($data);
        return view('admin.products.edit',$data);

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
        $product=Product::with('product_detail')
        ->with('product_images')->findOrFail($id);
        $productDetailId=$product->product_detail ? $product->product_detail->id : null;
        $thumbnailOld=$product->thumbnail;

        // get list product image from DB
        $listProductImageDB = [];
        if (!empty($product->product_images)) {
            foreach ($product->product_images as $img) {
                $listProductImageDB[] = $img->url;
            }
        }

        $thumbnailPath=null;
        if($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()){
            // Nếu có thì thục hiện lưu trữ file vào public/products/thumbnail
            $image = $request->file('thumbnail');
            $extension = $request->thumbnail->extension();
            $extension = strtolower($extension); // convert string to lowercase
            $fileName = 'thumbnail_' . time() . '.' . $extension;

            // upload file to server
            $image->move(self::FOLDER_UPLOAD_PRODUCT_THUMBNAIL, $fileName);
            
            // set filename
            $thumbnailPath = self::FOLDER_UPLOAD_PRODUCT_THUMBNAIL . '/' . $fileName;
            $product->thumbnail=$thumbnailPath;
        }
        $product->name=$request->name;
        $product->description=$request->description;
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->status=$request->status;
        $product->is_feature=$request->is_feature;

        $files=$request->url;
        $listProductImageForm=[];
            if(!empty($files)){
                foreach ($files as $file) {
                    $extension = $file->extension();
                    $extension = strtolower($extension); // convert string to lowercase
                    $fileName = 'image_' . time() . rand() . '.' . $extension;

                    // upload file to server
                    $file->move(self::FOLDER_UPLOAD_PRODUCT_IMAGE, $fileName);
                    //add url image into array
                    $listProductImageForm[]=self::FOLDER_UPLOAD_PRODUCT_IMAGE . '/' . $fileName;;
                }
            }
        
        DB::beginTransaction();
        try{
            //Insert product into table products
            $product->save();

            //Insert content into table product_details
            if(!empty($request->content)){
                $dataDetailProduct=[
                    'content'=>$request->content,
                    'product_id'=>$id,
                ];
                // create or update data for table post_details
                if (!$productDetailId) { // create
                    $productDetail = new ProductDetail($dataDetailProduct);
                    $productDetail->save();
                } else { // update
                    ProductDetail::find($productDetailId)
                        ->update($dataDetailProduct);
                }
            }
            
            // insert data for table product_images
            if (!empty($listProductImageForm)) {
                foreach($listProductImageForm as $url){
                    $dataProductImageSave=[
                        'url'=>$url,
                        'product_id'=>$product->id,
                    ];
                    ProductImage::create($dataProductImageSave);
                }
            }
            DB::commit();
            // SAVE OK then delete OLD file
            if (File::exists(public_path($thumbnailOld))
                && $thumbnailPath != null) {
                File::delete(public_path($thumbnailOld));
            }
            if(!empty($listProductImageDB) && !empty($listProductImageForm)){
                // compare data of 2 array (listProductImageForm, listProductImageDB) to get new an array (difference between 2 array)
                $listProductImageDiff = array_diff($listProductImageDB, $listProductImageForm);
                if (!empty($listProductImageDiff)) {
                    foreach ($listProductImageDiff as $diff) {
                        ProductImage::where('url', $diff)
                            ->delete();
                        if (File::exists(public_path($diff))) {
                            File::delete(public_path($diff));
                        }
                    }
                }
            }
            return redirect()->route('admin.product.index')->with('success','Update product success!!!');

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
    public function destroy($id)
    {
        //
        DB::beginTransaction();
        try{
            $product=Product::with('product_detail')->with('product_images')->findOrFail($id);
            //Delete product_detail of product $id
            $product->product_detail->delete();
            //Delete product images of product $id
            ProductImage::where('product_id',$id)->delete();
            //Delete product
            $product->delete();

            DB::commit();
            return redirect()->route('admin.product.index')->with('success', 'Delete successful!');
        }catch(\Exception $ex){
            DB::rollBack();
            return redirect()->back()->with('error',$ex->getMessage());
        }
        
    }
    public function search(Request $request){
        $data=[];
         // get list data of table products
         $products = Product::with('category');

         // search category_id
        if(!empty($request->category_id)){
            $products=Product::where('category_id', $request->category_id);
        }
        // search product name
        if(!empty($request->keyword)){
            $products=Product::where('name', 'LIKE', '%' . $request->input('keyword') . '%');
        }

        // order ID desc
        $products = $products->orderBy('id', 'desc');
        
        // pagination
        $products = $products->paginate(10);

        $categories = Category::where('parent_id', '=', 0)->get();

        $data['categories'] = $categories;
        $data['products'] = $products;
        return view('admin.products.index', $data);
    }
}
