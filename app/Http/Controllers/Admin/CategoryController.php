<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //method: get
        $categories = Category::paginate(20);
        // dd($categories);
        return view('admin.categories.index', ['categories' => $categories]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //method:get
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //method:post   
        $parent_id='';  
        if($request->parent_id==''){
            $parent_id = 0;
        }else{
            $parent_id=$request->parent_id;
        }
        $categoryInsert=[
            'name'=>$request->name,
            'parent_id'=>$parent_id,
        ];
        // dd($categoryInsert);
        DB::beginTransaction();
        
        try {
            Category::create($categoryInsert);

            // insert into data to table category (successful)
            DB::commit();
            return redirect()->route('admin.category.index')->with('success', 'Insert into data to Category Successful.');
        } catch (\Exception $ex) {
            // insert into data to table category (fail)
            DB::rollBack();
            return redirect()->route('admin.category.index')->with('error', $ex->getMessage());
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
        $categoryDetails = Category::find($id);

        // insert into data to table category (successful)
        return view('admin.category.details',['categoryDetails'=>$categoryDetails]);
        
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
        $category = Category::findOrFail($id);
        $data['category'] = $category;

        return view('admin.categories.edit', $data);
        
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
        //method:PUT
        DB::beginTransaction();
        try {
            Category::where('id',$id)->update([
                'name'=>$request->name,
                'parent_id'=>$request->parent_id
            ]);     
            DB::commit();
            return redirect()->route('admin.category.index')->with('success','Update data category success');
        } catch (\Exception $ex) {
            // update data to table category (fail)
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
            //Cách 1:
            $category= Category::find($id);
            $category->delete();   
            // Delete data to table category (successful)
            DB::commit();
            return redirect()->route('admin.category.index')->with('success','Delete data category success');
        } catch (\Exception $ex) {
            // insert into data to table category (fail)
            DB::rollBack();
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
    public function search(Request $request){
        $data = [];
        
        // get list data of table posts
        $categories = Category::where('name', 'LIKE', '%' . $request->input('category_name') . '%')
            ->get();
        // get list data of table categories
        $data['categories'] = $categories;
        // dd($posts);
        return view('admin.category.index', $data);
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
