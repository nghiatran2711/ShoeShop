<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index(){
        $data=[];
        $product_new=Product::limit(10)->get();
        $product_feature=Product::where('is_feature',1)->get();
        $currentDate = date('Y-m-d');
        // $product_promotions = DB::table('products')
        //     ->join('product_promotion', 'products.id', '=', 'product_promotion.product_id')
        //     ->join('promotions', 'product_promotion.promotion_id', '=', 'promotions.id')
        //     ->join('prices','products.id','=','prices.product_id')
        //     ->where('promotions.begin_date','<=',$currentDate )->where('promotions.end_date','>=',$currentDate)->orderBy('products.id')
        //     ->get();
        $categories = Category::where('parent_id', '=', 0)->get();
        $brands=Brand::get();
        // $data['product_promotions']=$product_promotions;
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
        $sizes=Size::pluck('name','id');
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
            $data['sizes']=$sizes;
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
            $products = Product::where('category_id', $request->catsearch);
        }
        if (!empty($request->keyword)) {
            $products = Product::where('name', 'like', '%' . $request->keyword . '%');
        }
        if(!empty($request->catsearch) && !empty($request->keyword)){
            $products = Product::where('category_id',$request->catsearch)->where('name', 'like', '%' . $request->keyword . '%');
        }
        
        // order ID desc
        $products = $products->orderBy('id', 'desc')->get();

        $data['categories']=$categories_menu;
        $data['products']=$products;
        $data['category_id']=$request->catsearch;
        $data['keyword']=$request->keyword;
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


    public function sort_list_product_category(Request $request,$name){
        // Lấy chi tiết loại sản phẩm
        $categories_menu = Category::where('parent_id', '=', 0)->get();
        $cate=Category::where('name',$name)->first();
        $size=Size::pluck('name','id');
        // dd($cate);
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

            $current_date=date('Y-m-d');
            if($request->sortby==''){
                $products = DB::table('products')->join('prices', 'prices.product_id', '=', 'products.id')->whereIn('category_id' , $ids)
                ->where('end_date', '>=', $current_date)
                ->get();
            }elseif($request->sortby=='lowest'){
                $products = DB::table('products')->join('prices', 'prices.product_id', '=', 'products.id')->whereIn('category_id' , $ids)
                ->where('end_date', '>=', $current_date)
                ->orderBy('price', 'asc')
                ->get();
            }elseif($request->sortby=='highest'){
                $products = DB::table('products')->join('prices', 'prices.product_id', '=', 'products.id')->whereIn('category_id' , $ids)
                ->where('end_date', '>=', $current_date)
                ->orderBy('price', 'desc')
                ->get();
            }elseif($request->sortby=='ascending'){
                $products = DB::table('products')->join('prices', 'prices.product_id', '=', 'products.id')->whereIn('category_id' , $ids)
                ->where('end_date', '>=', $current_date)
                ->orderBy('name', 'asc')
                ->get();
            }elseif($request->sortby=='descending'){
                $products = DB::table('products')->join('prices', 'prices.product_id', '=', 'products.id')->whereIn('category_id' , $ids)
                ->where('end_date', '>=', $current_date)
                ->orderBy('name', 'desc')
                ->get();
            }
        }
            $data['products']=$products;
            $data['categories']=$categories_menu;
            $data['cate']=$cate;
            $data['sort_by']=$request->sortby;

        return view('categories.sort_product_category',$data);
    }
    public function sort_list_product_brand(Request $request,$name){
        $data=[];
        $categories_menu = Category::where('parent_id', '=', 0)->get();
        $brand=Brand::where('name',$name)->first();
        $current_date=date('Y-m-d');
        if($request->sortby==''){
            $products = DB::table('products')->join('prices', 'prices.product_id', '=', 'products.id')->where('brand_id',$brand->id)
            ->where('end_date', '>=', $current_date)
            ->get();
        }elseif($request->sortby=='lowest'){
            $products = DB::table('products')->join('prices', 'prices.product_id', '=', 'products.id')->where('brand_id',$brand->id)
            ->where('end_date', '>=', $current_date)
            ->orderBy('price', 'asc')
            ->get();
        }elseif($request->sortby=='highest'){
            $products = DB::table('products')->join('prices', 'prices.product_id', '=', 'products.id')->where('brand_id',$brand->id)
            ->where('end_date', '>=', $current_date)
            ->orderBy('price', 'desc')
            ->get();
        }elseif($request->sortby=='ascending'){
            $products = DB::table('products')->join('prices', 'prices.product_id', '=', 'products.id')->where('brand_id',$brand->id)
            ->where('end_date', '>=', $current_date)
            ->orderBy('name', 'asc')
            ->get();
        }elseif($request->sortby=='descending'){
            $products = DB::table('products')->join('prices', 'prices.product_id', '=', 'products.id')->where('brand_id',$brand->id)
            ->where('end_date', '>=', $current_date)
            ->orderBy('name', 'desc')
            ->get();
        }
        $data['categories']=$categories_menu;
        $data['products']=$products;
        $data['brand']=$brand;
        $data['sort_by']=$request->sortby;
        return view('brands.sort_product_brand',$data);

    }

    public function filter_product_category(Request $request,$name){
        // Lấy chi tiết loại sản phẩm
        $categories_menu = Category::where('parent_id', '=', 0)->get();
        $cate=Category::where('name',$name)->first();
        $sizes=Size::pluck('name','id');

        $price=$request->input('price');
        // $price = explode("-", $request->price);
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

            $current_date=date('Y-m-d');
            if($price==''){
                $products = DB::table('products')->join('prices', 'prices.product_id', '=', 'products.id')
                ->whereIn('category_id' , $ids)
                ->where('end_date', '>=', $current_date)
                ->get();
            }elseif($price=="3000000"){
                $products = DB::table('products')->join('prices', 'prices.product_id', '=', 'products.id')
                ->whereIn('category_id' , $ids)
                ->where('price','<',$price)
                ->where('end_date', '>=', $current_date)
                ->get();
                // dd($products);
            }elseif($price=="9000000"){
                $products = DB::table('products')->join('prices', 'prices.product_id', '=', 'products.id')
                ->whereIn('category_id' , $ids)
                ->where('price','>',$price)
                ->where('end_date', '>=', $current_date)
                ->get();
                // dd($products);
            }else{
                $price=explode("-",$price);
                $priceStart=$price[0];
                $priceEnd=$price[1];
                $products = DB::table('products')->join('prices', 'prices.product_id', '=', 'products.id')
                ->whereIn('category_id' , $ids)
                ->whereBetween('price',[$priceStart, $priceEnd])
                ->where('end_date', '>=', $current_date)
                ->get();
            }
        }
            $data['price']=$request->price;
            $data['sizes']=$sizes;
            $data['products']=$products;
            $data['categories']=$categories_menu;
            $data['cate']=$cate;

        return view('categories.filter_product_category_by_price',$data);
    }
}
