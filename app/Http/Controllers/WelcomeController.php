<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use DB,Cart;
use Request;
class WelcomeController extends Controller
{
    public function index(){
    	//$product =DB::table('products')->select('id','name','image','price','alias','intro')->orderBy('id','DESC')->skip(0)->take(4)->get();
        //return view('user.pages.products',compact('product'));
       $product =DB::table('products')->select('id','name','image','price','alias','intro')->orderBy('id','DESC')->skip(0)->paginate(4);

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

    public function chitietsanpham($id){
       $product_detail=DB::table('products')->where('id',$id)->first();
       $image=DB::table('product_images')->select('id','image')->where('product_id',$product_detail->id)->get();

       //Lay 3 san pham lien quan
       $product_cate=DB::table('products')->where('cate_id',$product_detail->cate_id)->where('id','<>',$id)->take(3)->get();

       //menu detail
       $cate=DB::table('cates')->select('parent_id','name')->where('id',$product_detail->cate_id)->first();

       $menu_cate=DB::table('cates')->select('id','name','alias')->where('parent_id',$cate->parent_id)->get();
       return view('user2.pages.detail',compact('product_detail','image','product_cate','menu_cate'));
    }

    public function muahang($id){
        $product_buy=DB::table('products')->where('id',$id)->first();
        Cart::add(array('id'=>$id,'name'=>$product_buy->name,'qty'=>1,'price'=>$product_buy->price,'options' => (['img'=>$product_buy->image])));
        //Cart::add(array('id'=>$id,'name'=>$product_buy->name,'qty'=>1,'price'=>$product_buy->price,'options'=>$product_buy->image));
        $content=Cart::content();
        //print_r($content);
        return redirect()->route('giohang');
    }

    public function giohang(){
        $content=Cart::content();
        $subtotal=Cart::subtotal();
        $total=Cart::total();
        //print_r($content);
        return view('user2.pages.basket',compact('content','total','subtotal'));
    }

    public function xoasanpham($id){
      Cart::remove($id);

      return redirect()->route('giohang');
    }

    public function capnhat(){
      if(Request::ajax()){
        $id=Request::get('id');
        $qty=Request::get('qty');
        Cart::update($id,$qty);
        echo "oke";
      }
    }

    public function getcheckout(){
      return view('user2.pages.checkout1');
    }

    public function postcheckout(){
      $customer=new Customer;
      $customer->name=$request->name;
      //$customer->gender=$request->gender;
      $customer->name=$request->email;
      $customer->name=$request->address;
      $customer->name=$request->phone;
      //$customer->name=$request->notes;
      $customer->save();





    }
}
