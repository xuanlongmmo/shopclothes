<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\addproduct;
use App\Http\Requests\editproduct;
use Illuminate\Support\Facades\Auth;

//Model
use App\product;
use App\category_product;
use App\image_product;

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
        $large_category = category_product::where('id_parent',0)->get();
        $small_category = category_product::where('id_parent','>',0)->get();
        return view('admin.product.add',compact('large_category','small_category'));
    }

    public function postaddproduct(addproduct $request){
        $maxid = product::max('id');
        $imageName = time().'_'.$request->image->getClientOriginalName();
        $request->image->move(public_path('sources/img/products'), $imageName);
        $save = product::create([
            'id' => $maxid+1,
            'product_name' => $request->product_name,
            'link_image' => 'sources/img/products/'.$imageName,
            'price' => $request->price,
            'sale_percent' => $request->sale,
            'description' => $request->editor1,
            'status' => $request->status,
            'id_user' => Auth::user()->id,
            'large_category' => $request->large_category,
            'small_category' => $request->small_category,
        ]);
        foreach($request->images as $item){
            $imageNames = time().'_'. $item->getClientOriginalName();
            $item->move(public_path('sources/img/products'), $imageNames);
            $db = new image_product();
            $db->id_product = $maxid+1;
            $db->image = 'sources/img/products/'.$imageNames;
            $db->save();
        }
        return redirect()->route('admin.product');
    }

    public function editproduct($id){
        $data = product::find($id);
        $large_category = category_product::where('id_parent',0)->get();
        $small_category = category_product::where('id_parent','>',0)->get();
        return view('admin.product.edit',compact('large_category','small_category','data'));
    }

    public function posteditproduct(editproduct $request){
        if($request->image == null){
            $save = product::where('id',$request->id)->update([
                'product_name' => $request->product_name,
                'price' => $request->price,
                'sale_percent' => $request->sale,
                'description' => $request->editor1,
                'status' => $request->status,
                'large_category' => $request->large_category,
                'small_category' => $request->small_category,
            ]);
        }else{
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('sources/img/products'), $imageName);
            $save = product::where('id',$request->id)->update([
                'product_name' => $request->product_name,
                'link_image' => 'sources/img/products/'.$imageName,
                'price' => $request->price,
                'sale_percent' => $request->sale,
                'description' => $request->editor1,
                'status' => $request->status,
                'large_category' => $request->large_category,
                'small_category' => $request->small_category,
            ]);
        }
        if($request->images != null){
            foreach($request->images as $item){
                $imageNames = time().'_'. $item->getClientOriginalName();
                $item->move(public_path('sources/img/products'), $imageNames);
                $db = new image_product();
                $db->id_product = $request->id;
                $db->image = 'sources/img/products/'.$imageNames;
                $db->save();
            }
        }
        return redirect()->route('admin.product');
    }
}
