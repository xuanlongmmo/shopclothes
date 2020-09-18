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
        $categories = category_product::where('id_parent',0)->get();
        $products = product::paginate(3); 
        //Lấy 3 sản phẩm top đánh giá
        $db = new product();
        $product = $db->review->avg('star');
        // dd($product);
        return view('frontend.product.index',compact('categories','products'));
    }

    //Chi tiết sản phẩm
    public function detailproduct(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = $_GET['id'];
            $product = product::find($id);
            if(!$product){
                return redirect()->route('frontend.listproduct');
            }else{
                //Lấy review
                $db = new review_product();
                $reviews = $db->where('id_product',$id)->paginate(5);

                //Lấy 5 sản phẩm tương tự
                $dbproduct = new product();
                $same_product = $dbproduct->where('large_category',$product->large_category)->get();
                return view('frontend.product.detail-product',compact('product','reviews','same_product'));
            }
        }else{
            return redirect()->route('frontend.listproduct');
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
        $categories = category_product::where('id_parent',0)->get();
        $check = 0;

        foreach($categories as $item){
            if($item->slug_name == $slug_name){
                $check = 1;
            }
        }

        if($check==0){
            // $categories = category_product::where('id_parent',0)->get();
            $db = new category_product();
            $products = $db->join('product','product.small_category','category_product.id')->where('category_product.slug_name',$slug_name)->Paginate(12);
            return view('frontend.product.detail-category',compact('categories','products'));
        }else if($check==1){
            // $id_category = category_product::where('slug_name',$slug_name)->get();
            // $categories = category_product::where('id_parent',$id_category[0]->id)->get();
            $db = new category_product();
            $products = $db->join('product','product.large_category','category_product.id')->where('category_product.slug_name',$slug_name)->Paginate(12);
            return view('frontend.product.detail-category',compact('categories','products'));
        }
    }
}
