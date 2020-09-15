<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\product;

class ProductController extends Controller
{
    public function getproduct(){
        $list_product = product::orderBy('created_at', 'DESC')->get();
        return view('admin.product.index',compact('list_product'));
    }

    public function deleteproduct($id){
        $delete = product::where('id',$id)->delete();
        return redirect()->route('admin.product');
    }

    public function addproduct(){
        return view('admin.product.add');
    }

    public function postaddproduct(Request $request){
        dd($request->image);
    }

    public function editproduct($id){
        
    }

    public function posteditproduct(Request $request){
        
    }
}
