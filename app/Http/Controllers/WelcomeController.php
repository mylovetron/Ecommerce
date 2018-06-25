<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class WelcomeController extends Controller
{
    public function index(){
    	$product =DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->skip(0)->take(4)->get();
        //return view('user.pages.products',compact('product'));
        return view('user2.pages.index',compact('product'));
        //return view('user2.test',compact('product'));

    }

    public function loaisanpham($id){
    	$product_cate=DB::table('products')->select('id','name','image','price','alias','cate_id')->where('cate_id',$id)->get();
    	//print_r($product_cate);
    	$cate=DB::table('cates')->select('parent_id','name')->where('id',$product_cate[0]->cate_id)->first();
    	//print_r($cate);
    	$menu_cate=DB::table('cates')->select('id','name','alias')->where('parent_id',$cate->parent_id)->get();
    	//print_r($menu_cate);
    	return view('user.pages.cate',compact('product_cate','menu_cate','cate'));
    }
}
