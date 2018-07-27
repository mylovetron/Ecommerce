<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use DB,Cart;
use Request;
use App\Customer;
use App\Bill;
use App\Bill_detail;
use Session;
use Config;
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
        $delivery=0;
        $product_buy=DB::table('products')->where('id',$id)->first();
        Cart::add(array('id'=>$id,'name'=>$product_buy->name,'qty'=>1,'price'=>$product_buy->price,'options' => (['img'=>$product_buy->image,'delivery'=>$delivery])));
        //Cart::add(array('id'=>$id,'name'=>$product_buy->name,'qty'=>1,'price'=>$product_buy->price,'options'=>$product_buy->image));
        $content=Cart::content();
        //print_r($content);
        return redirect()->route('giohang');
    }

    public function giohang(){
        $content=Cart::content();
        $subtotal=Cart::subtotal(0,',','');
        $tax=$subtotal*config::get('constants.TAX');
        $total=$subtotal*config::get('constants.TAX')+$subtotal;
        //print_r($content);
        return view('user2.pages.basket',compact('content','total','subtotal','tax'));
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

    public function postcheckout(Request $request){
      
      $cart=Session::get('cart');
      //dd($cart);
      $customer=new Customer;
      $customer->name=Request::input('name');
      $customer->email=Request::input('email');
      $customer->address=Request::input('address');
      $customer->phone_number=Request::input('phone');
      $customer->note="note";
      $customer->gender="no";
      //$customer->save();

      $bill=new bill;
      $bill->id_customer=$customer->id;
      $bill->date_order=date('Y-m-d');
      $bill->total= config::get('constants.TAX')*Cart::subtotal(0,',','')+Cart::subtotal(0,',','');
      $bill->payment="payment";
      $bill->note="note";
      //$bill->save();

      foreach ($cart['items'] as $key => $value) {
        $bill_detail=new Bill_detail;
        $bill_detail->id_bill=$bill->id;
        $bill_detail->id_product=$key;
        $bill_detail->quantity=$value['qty'];
        $bill_detail->unit_price=($value['price']/$value ['qty']);
        //$bill_detail->save();
        print_r($bill_detail);

      }
     // Session::forget('cart');
      //return redirect()->back()->with('thongbao','Đặt hàng thành công');



    }
}
