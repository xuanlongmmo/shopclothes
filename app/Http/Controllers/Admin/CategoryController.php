<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\categoryproduct;

use App\category_product;

class CategoryController extends Controller
{
    public function getcategory(){
        $category_product = category_product::all();
        return view('admin.category.index',compact('category_product'));
    }

    public function deletecategory($id){
        $delete = category_product::find($id)->delete();
        return redirect()->route('admin.category');
    }

    public function editcategory($id){
        $data = category_product::find($id);
        $large_category = category_product::where('id_parent',0)->get();
        return view('admin.category.edit',compact('large_category','data'));
    }

    public function posteditcategory(categoryproduct $request){
        if($request->type == 1){
            //Danh mục lớn
            $save = category_product::where('id',$request->id)->update([
                'category_name'=>$request->category_name, 
                'slug_name'=>$request->slug_name,
                'status'=> $request->status,
                'id_user' => Auth::user()->id,
                'id_parent' => 0,
            ]);
        }elseif ($request->type == 2) {
            //Danh mục nhỏ
            $save = category_product::where('id',$request->id)->update([
                'category_name'=>$request->category_name, 
                'slug_name'=>$request->slug_name,
                'status'=> $request->status,
                'id_user' => Auth::user()->id,
                'id_parent' => $request->category,
            ]);
        }
        return redirect()->route('admin.category');
    }

    public function addcategory(){
        $large_category = category_product::where('id_parent',0)->get();
        return view('admin.category.add',compact('large_category'));
    }

    public function postaddcategory(categoryproduct $request){
        if($request->type == 1){
            //Danh mục lớn
            $save = category_product::insert([
                'category_name'=>$request->category_name, 
                'slug_name'=>$request->slug_name,
                'status'=> $request->status,
                'id_user' => Auth::user()->id,
                'id_parent' => 0,
            ]);
        }elseif ($request->type == 2) {
            //Danh mục nhỏ
            $save = category_product::insert([
                'category_name'=>$request->category_name, 
                'slug_name'=>$request->slug_name,
                'status'=> $request->status,
                'id_user' => Auth::user()->id,
                'id_parent' => $request->category,
            ]);
        }
        return redirect()->route('admin.category');
    }
}
