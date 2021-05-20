<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $data=[];
        $product_new=Product::limit(10)->get();
        $product_feature=Product::where('is_feature',1)->get();
        $categories = Category::where('parent_id', '=', 0)->get();
        $brands=Brand::get();
        $data['product_new']=$product_new;
        $data['product_feature']=$product_feature;
        $data['categories']=$categories;
        $data['brands']=$brands;
        // foreach($product->prices as $key => $value){
        //     echo $value->end_date;
        // }
        

        return view('home',$data);
    }
    public function product_by_category($category_name){

        // Lấy chi tiết loại sản phẩm
        $categories_menu = Category::where('parent_id', '=', 0)->get();
        $cate=Category::where('name',$category_name)->first();
        if ($cate) {
            //lấy danh sách category
            $categories = Category::get();
            $ids = [];
            // step 1:  Check danh mục cha -> lấy toàn bộ danh mục con để where In
            foreach($categories as $category) {
                if($category->id == $cate->id) {
                    $ids[] = $cate->id;
                    // Lấy ra các category id mà có parent id bằng với $cate->id;
                    foreach ($categories as $child) {
                        if ($child->parent_id == $cate->id) {
                            $ids[] = $child->id; // thêm phần tử vào mảng
                        }
                    }
                }
            }
            // step 2 : lấy list sản phẩm theo thể loại

            $products = Product::whereIn('category_id' , $ids)
            ->orderBy('id', 'desc')
            ->get();
        }
            $data['products']=$products;
            $data['categories']=$categories_menu;
            $data['cate']=$cate;

        return view('categories.product_by_category',$data);
    }

    public function product_by_brand($brand_name){
        $data=[];
        $categories_menu = Category::where('parent_id', '=', 0)->get();
        $brand=Brand::where('name',$brand_name)->first();
        $products=Product::where('brand_id',$brand->id)->orderBy('id','desc')->get();
        $data['categories']=$categories_menu;
        $data['products']=$products;
        $data['brand']=$brand;
        return view('brands.product_by_brand',$data);
    }

    public function search_product(Request $request){
        $categories_menu = Category::where('parent_id', '=', 0)->get();
        $products=Product::with('category');   
        
        // search post name
        if (!empty($request->catsearch)) {
            $products = Product::where('category_id', 'like', '%' . $request->catsearch . '%');
        }
        if (!empty($request->keyword)) {
            $products = Product::where('name', 'like', '%' . $request->keyword . '%');
        }
        // order ID desc
        $products = $products->orderBy('id', 'desc')->get();

        $data['categories']=$categories_menu;
        $data['products']=$products;
        // pagination
       
        
        return view('search',$data);
    }
    public function product_details($id){
        // Get category for display on menu
        $data=[];
        $categories_menu = Category::where('parent_id', '=', 0)->get();
        // get product by $id
        $product=Product::find($id);
        $product_relateds=Product::where('category_id',$product->category_id)->get();

        $data['categories']=$categories_menu;
        $data['product']=$product;
        $data['product_relateds']=$product_relateds;
        return view('product_details',$data);
    }
}
