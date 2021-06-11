<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Session;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticationUsers;
use App\Http\Requests;
use App\Models\Admin;

class AuthController extends Controller
{
    // /*
    // |--------------------------------------------------------------------------
    // | Login Controller
    // |--------------------------------------------------------------------------
    // |
    // | This controller handles authenticating users for the application and
    // | redirecting them to your home screen. The controller uses a trait
    // | to conveniently provide its functionality to your applications.
    // |
    // */
    
    // /**
    //  * Where to redirect users after login.
    //  *
    //  * @var string
    //  */
    protected $redirectTo = '/admin/home';
    // protected $redirectTo = '/admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getLogin()
    {
        // echo 111;die;
        return view('admin.login');
    }

    // /**
    //  * Show the application loginprocess.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            $user = auth()->guard('admin')->user()->status;
            if($user==0){
                auth()->guard('admin')->logout();
                \Session::flush();      
                return redirect()->route('admin.login')->with('success','Tài khoản của bạn chưa được active!');
            }
            return redirect()->route('admin.dashboard');
        } else {
            return back()->with('error','Email hoặc mật khẩu sai.');
        }

    }

    // /**
    //  * Show the application logout.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();
        \Session::flush();
        \Session::put('success','You are logout successfully');        
        return redirect()->route('admin.login');
    }

}