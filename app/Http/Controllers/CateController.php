<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
class CateController extends Controller
{
    public function index()
    {
        $cates = Cate::latest();
        return view('Admin.pages.cate_add',compact('cates'));
            
    }


    public function create()
    {
        return view('cates.create');
    }

    public function store(Request $request)
    {
        
        request()->validate([
            'name' => 'required',
            //'detail' => 'required',
        ]);
        $cate=new Cate;
        $cate->name=$request->name ;
        $cate->alias=$request->name;
        $cate->order=$request->order;
        $cate->parent_id=$request->sltParent;
        $cate->keywords=$request->keywords;
        $cate->description=$request->description;
        $cate->save();
        return redirect()->route('cates.index')
                        ->with('success','Cate created successfully.');

    }

    public function update(Request $request, Cate $cate)
    {
         request()->validate([
            'name' => 'required',
            //'detail' => 'required',
        ]);


        $cate->update($request->all());


        return redirect()->route('cates.index')
                        ->with('success','Product updated successfully');
    }
}
