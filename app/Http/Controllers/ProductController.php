<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Cate;
use App\Product;

class ProductController extends Controller
{
    public function getAdd(){
        $cate = Cate::select('id','name','parent_id')->get()->toArray();
        return view('admin.pages.product_add',compact('cate'));

    }
    public function postAdd(ProductRequest $product_request){


        $file_name=$product_request->file('fImages')->getClientOriginalName();
        $product =new Product();
        $product->name=$product_request->txtName;
        $product->alias=changeTitle($product_request->alias);
        $product->price=$product_request->txtPrice;
        $product->intro=$product_request->txtIntro;
        $product->content=$product_request->txtContent;
        $product->image=$file_name;
        $product->keywords=$product_request->txtKeywords;
        $product->description=$product_request->txtDescription;
        $product->user_id=1;
        $product->cate_id=$product_request->sltParent;
        $product_request->file('fImages')->move('resources/upload/',$file_name);
        $product->save();
        return redirect()->route('admin.product.getList')->with(['flash_level'=>'success','flash_message'=>'add categoy sussec!']);

    }

    public  function getList(){
        $data = Product::select('id','name','cate_id','price')->get()->toArray();
        return view('admin.pages.product_list',compact('data'));
    }
}
