<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Cate;
use App\Product;
use App\ProductImages;
use Input,File;
use Request;
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
        
        $product_id=$product->id;
        if($product_request->hasFile('fProductDetail')){
            foreach ($product_request->file('fProductDetail') as $file){
                $product_img=new ProductImages();
                if(isset($file)){
                    $product_img->image=$file->getClientOriginalName();
                    $product_img->product_id=$product_id;
                    $file->move('resources/upload/detail/',$file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }

        return redirect()->route('admin.product.getList')->with(['flash_level'=>'success','flash_message'=>'sản phẩm được thêm thành công!']);

    }

    public  function getList(){
        $data = Product::select('id','name','cate_id','price')->get()->toArray();
        return view('admin.pages.product_list',compact('data'));
    }

     public  function getDelete($id)
    {
        $product_detail=Product::find($id)->pimages->toArray();
        foreach ($product_detail as $value) {
            File::delete('resources/upload/detail/'.$value["image"]);

        }
        $product=Product::find($id);
        File::delete('resources/upload/'.$product->image);
        $product->delete($id);

        return redirect()->route('admin.product.getList')->with(['flash_level' => 'success', 'flash_message' => 'sản phẩm xóa thành công']);
    }

     public  function getEdit($id){
        $cate=Cate::select('id','name','parent_id')->get()->toArray();
        $product = Product::find($id);
        $product_image=Product::find($id)->pimages;
        return view('admin.pages.product_edit',compact('cate','product','product_image'));

    }

    public  function postEdit(Request $request,$id){
        //$this->validate($request,
        //    ["txtCateName"=>"required"],
        //    ["txtCateName.required"=>"Ban phai nhap CateLog Name"]
        //);
        $product=Product::find($id);
        $product->name=Request::input('txtName') ;
        $product->alias=changeTitle(Request::input('txtName'));
        $product->price=Request::input('sltParent');
        $product->intro=Request::input('txtIntro');
        $product->content=Request::input('txtContent');
        $product->keywords=Request::input('txtKeywords');
        $product->description=Request::input('txtDescription');
        $product->user_id=1;
        $product->cate_id=Request::input('sltParent');
        $product->save();
        return redirect()->route('admin.product.getList')->with(['flash_level'=>'success','flash_message'=>'Cập nhật dữ liệu thành công!']);

    }

    public function getDelImg($id){
        if(Request::ajax()){
            $idHinh=(int)Request::get('idHinh');
            $image=ProductImages::find($idHinh);
            if(!empty($image)){
                $img='resources/upload/detail/'.$image_detail->image;
                if(File::exists($img)){
                    File::delete($img);
                }
                $image_detail->delete();
            }
            return "oke";
        }
    }
}
