<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    //View Login Admin
    public function view_login(){
        return view('admin.login');
    }
    //Login admin
    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            $user = auth()->guard('admin')->user();
            
            // Session::put('success','You are Login successfully!!');
            return redirect()->route('admin.dashboard')->with('success','You are login successfullly');
            
        } else {
            return back()->with('error','your username and password are wrong.');
        }
    }
    public function destroy()
    {
        auth()->guard('admin')->logout();
        Session::flush();
        Session::put('success','You are logout successfully');        
        return redirect()->route('admin.login');
    }
}
