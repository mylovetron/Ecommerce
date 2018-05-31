<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\Http\Requests\CateRequest;

class CateController extends Controller
{
    public  function getAdd(){
        $parent = Cate::select('id','name','parent_id')->orderBy('id','DESC')->get()->toArray();
        return view('admin.pages.cate_add',compact('parent'));
    }

    public  function getList(){
        $data = Cate::select('id','name','parent_id')->get()->toArray();
        return view('admin.pages.cate_list',compact('data'));
    }

    public  function postAdd(CateRequest $request){
        $cate=new Cate;
        $cate->name=$request->txtCateName ;
        $cate->alias=changeTitle($request->txtCateName);
        //$cate->alias=$request->txtCateName;
        $cate->order=$request->txtOrder;
        $cate->parent_id=$request->sltParent;
        $cate->keywords=$request->txtKeywords;
        $cate->description=$request->txtDescription;
        $cate->save();
        //print_r($cate);
        //return redirect()->route('admin.pages.cate_list')->with(['flash_level'=>'success','flash_message'=>'add categoy sussec!']);
    }

    public  function getDelete($id)
    {
        $parent = Cate::where('parent_id', $id)->count();
        if ($parent == 0) {
            $cate = Cate::find($id);
            $cate->delete($id);
            return redirect()->route('admin.cate.getList')->with(['flash_level' => 'success', 'flash_message' => 'delete success']);
        } else {
            echo "<script type='text/javascript'>
                alert('Sorry !You can not Delete this category');
                window.location='";
                echo route('admin.cate.getList');
            echo "'
            </script>";
        }
    }

    public  function getEdit($id){
        $data=Cate::findOrFail($id)->toArray();
        $parent = Cate::select('id','name','parent_id')->get()->toArray();
        return view('admin.pages.cate_edit',compact('data','parent'));
    }

    public  function postEdit(Request $request,$id){
        $this->validate($request,
            ["txtCateName"=>"required"],
            ["txtCateName.required"=>"Ban phai nhap CateLog Name"]
        );
        $cate=Cate::find($id);
        $cate->name=$request->txtCateName ;
        $cate->alias=changeTitle($request->txtCateName);
        $cate->order=$request->txtOrder;
        $cate->parent_id=$request->sltParent;
        $cate->keywords=$request->txtKeywords;
        $cate->description=$request->txtDescription;
        //print_r($cate);
        $cate->save();
        return redirect()->route('admin.cate.getList')->with(['flash_level'=>'success','flash_message'=>'edit categoy success!']);

    }

}
