<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sizes = Size::paginate(5);
        // dd($sizes);
        return view('admin.sizes.index', ['sizes' => $sizes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.sizes.create');
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
        $sizeInsert=[
            'name'=>$request->name
        ];
        // dd($categoryInsert);
        DB::beginTransaction();
        
        try {
            
            Size::create($sizeInsert);

            // insert into data to table size (successful)
            DB::commit();
            return redirect()->route('admin.size.index')->with('success', 'Insert into data to Size Successful.');
        } catch (\Exception $ex) {
            // insert into data to table size (fail)
            DB::rollBack();
            return redirect()->route('admin.size.index')->with('error', $ex->getMessage());
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
        $data = [];
        $size = Size::findOrFail($id);
        $data['size'] = $size;

        return view('admin.sizes.edit', $data);
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
        DB::beginTransaction();
        try {
            Size::where('id',$id)->update([
                'name'=>$request->name
            ]);     
            // update data to table size (successful)
            DB::commit();
            return redirect()->route('admin.size.index')->with('success','Update data size success');
        } catch (\Exception $ex) {
            // update data to table size (fail)
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
        //
        DB::beginTransaction();
        try {
            //Cách 1:
            $size= Size::find($id);
            $size->delete();   
            // Delete data to table size (successful)
            DB::commit();
            return redirect()->route('admin.size.index')->with('success','Delete data size success');
        } catch (\Exception $ex) {
            // insert into data to table size (fail)
            DB::rollBack();
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
