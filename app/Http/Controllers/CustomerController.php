<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public  function getAdd(){
        //$parent = Cate::select('id','name','parent_id')->orderBy('id','DESC')->get()->toArray();
        //return view('admin.pages.cate_add',compact('parent'));
    }

    public  function postAdd(CateRequest $request){
        $customer=new Customer;
        $customer->name=$request->name ;
        $customer->name=$request->name ;
        
    }
}
