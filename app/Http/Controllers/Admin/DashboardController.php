<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard(){
        $data=[];
        $customer=User::count();
        $order=Order::count();
        $user=Admin::count();
        $data['user']=$user;
        $data['customer']=$customer;
        $data['order']=$order;
        return view('admin.dashboard',$data);
    }
}
