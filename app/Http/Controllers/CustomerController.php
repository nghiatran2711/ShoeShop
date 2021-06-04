<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    //
    public function view_profile(){
        $data=[];
        $categories_menu = Category::where('parent_id', '=', 0)->get();
        $data['categories']=$categories_menu;
        return view('profile.view_profile',$data);
    }
    public function edit_profile(){
        $data=[];
        $categories_menu = Category::where('parent_id', '=', 0)->get();
        $data['categories']=$categories_menu;
        return view('profile.edit_profile',$data);
    }
    public function update_profile(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'address'=>'required|string|max:255',
            'phone' => 'required|digits:10',
        ]);
            $customer=User::find($id);
            $customer->name=$request->name;
            $customer->email=$request->email;
            $customer->address=$request->address;
            $customer->phone=$request->phone;
        DB::beginTransaction();
        try{
            $customer->save();
            DB::commit();
            return redirect()->route('view_profile')->with('success','Cập nhật thông tin cá nhân thành công');
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
    public function change_password(){
        $data=[];
        $categories_menu = Category::where('parent_id', '=', 0)->get();
        $data['categories']=$categories_menu;
        return view('profile.change_pass',$data);
    }
    public function update_password(Request $request,$id){
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|confirmed|min:8',
        ]);
        $customer=User::find($id);
        $customer->email=$request->email;
        $customer->password=Hash::make($request->password);
        DB::beginTransaction();
        try{
            $customer->save();
            DB::commit();
            return redirect()->route('view_profile')->with('success','Đổi mật khẩu thành công');
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with('error',$ex->getMessage());
        }

    }
}
