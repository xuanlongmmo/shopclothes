<?php

namespace App\Http\Controllers\Frontend;
//Gọi model
use App\category_product;
use App\product;
use App\review_product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //Danh sách sản phẩm
    public function listproduct(){
        $categories = category_product::where('id_parent',0)->where('status',1)->get();
        $products = product::where('status',1)->OrderBy('created_at','DESC')->paginate(12); 
        return view('frontend.product.index',compact('categories','products'));
    }

    //Chi tiết sản phẩm
    public function detailproduct($id){
        $product = product::find($id);
        if(!$product){
            return redirect()->route('frontend.listproduct');
        }else{
            //Lấy review
            $db = new review_product();
            $reviews = $db->where('id_product',$id)->paginate(5);

            //Lấy 5 sản phẩm tương tự
            $dbproduct = new product();
            $same_product = $dbproduct->where('large_category',$product->large_category)->where('status',1)->get();
            if($product->status == 0){
                return redirect()->route('frontend.listproduct');
            }else{
                $oldview = $product->view;
                $newview = $oldview + 1;
                $updateview = product::where('id',$id)->update([
                    'view' => $newview
                ]);
                return view('frontend.product.detail-product',compact('product','reviews','same_product'));
            }
        }
    }

    //Đánh giá sản phẩm
    public function postrate(Request $request){
        if(Auth::check()){
            $add = review_product::create($request->all());
            return redirect()->back();
        }else{
            
        }
    }

    //Xem sản phẩm theo danh mục
    public function detail_category($slug_name){
        $categories = category_product::where('id_parent',0)->where('status',1)->get();
        $check = 0;

        foreach($categories as $item){
            if($item->slug_name == $slug_name){
                $check = 1;
            }
        }

        if($check==0){
            $id_category = category_product::where('slug_name',$slug_name)->get();
            $products = product::where('small_category',$id_category[0]->id)->where('status',1)->Paginate(12);
            return view('frontend.product.detail-category',compact('categories','products'));
        }else if($check==1){
            $id_category = category_product::where('slug_name',$slug_name)->get();
            $products = product::where('large_category',$id_category[0]->id)->where('status',1)->Paginate(12);
            return view('frontend.product.detail-category',compact('categories','products'));
        }
    }

    public function search(Request $request){
        $categories = category_product::where('id_parent',0)->where('status',1)->get();
        $products = product::where('product_name','LIKE',"%$request->search%")->OrderBy('created_at','DESC')->paginate(12); 
        return view('frontend.product.search',compact('categories','products'));
    }
}
