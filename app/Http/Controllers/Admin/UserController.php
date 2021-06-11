<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(){
        $data=[];
        $users=Admin::select('id','name','email','role_id','created_at','status')->where('role_id','<>',1)->paginate(10);
        $data['users']=$users;
        return view('admin.users.list_user',$data);
    }

    public function create(){
        $data=[];
        $roles=Role::where('id','<>',1)->get();
        $data['roles']=$roles;
        return view('admin.users.create',$data);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'role_id'=>'required',
        ]);
        $name=$request->name;
        $email=$request->email;
        $password=Hash::make(12345);
        $role_id=$request->role_id;
        $status=1;
        $dataInsert=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make(12345),
            'role_id'=>$request->role_id,
            'status'=>1,   
        ];

        DB::beginTransaction();
        try{
            Admin::create($dataInsert);
            DB::commit();
            return redirect()->route('admin.user.list_user')->with('message','Created user success');
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with('error',$ex->getMessage());
        }

    }
    public function active($id){
        $users=Admin::find($id);
        $users->status=1;
        DB::beginTransaction();
        try{
            $users->save();
            DB::commit();
            return redirect()->back()->with('success','Active user success');
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
    public function de_active($id){
        $users=Admin::find($id);
        $users->status=0;
        DB::beginTransaction();
        try{
            $users->save();
            DB::commit();
            return redirect()->back()->with('success','De active user success');
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
    public function reset_password($id){
        $data=[];
        $user=Admin::find($id);
        $data['user']=$user;
        return view('admin.users.reset_password',$data);

    }
    public function update_password(Request $request,$id ){
        
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $user=Admin::find($id);
        $user_name=$user->name;
        $user->password=Hash::make($request->password);
        DB::beginTransaction();
        try{
            $user->save();
            DB::commit();
            return redirect()->route('admin.user.list_user')->with('success',"Resset password User: $user_name success");
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
}
