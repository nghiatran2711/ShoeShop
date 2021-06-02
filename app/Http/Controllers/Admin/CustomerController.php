<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index(Request $request){
        
        $data=[];
        $date=$request->date;
        $name=$request->name;
        $customers=User::select('id','name','email','address','phone','created_at');
        if(!empty($date)){
            $customers=User::whereDate('created_at','=',$date);
        }
        if(!empty($name)){
            $customers=User::where('name','like','%' . $name . '%');
        }
        if(!empty($name) && !empty($date)){
            $customers=User::where('name','like','%' . $name . '%')->whereDate('created_at','=',$date);
        }
        $customers=$customers->orderBy('name', 'asc')->paginate(5);
        
        $data['date']=$date;
        $data['name']=$name;
        $data['customers']=$customers;
        return view('admin.customers.list_customer',$data);
    }
    
}
