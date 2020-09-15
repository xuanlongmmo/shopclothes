<?php

namespace App\Http\Controllers\Frontend;
//Gọi model
use App\small_category_product;
use App\large_category_product;
use App\product;
use App\review_product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //Danh sách sản phẩm
    public function listproduct(){
        $categories = large_category_product::all();
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
                $same_product = $dbproduct->where('id_large_category',$product->id_large_category)->get();
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
        $categories = large_category_product::all();
        $large_category =  large_category_product::all();
        $small_category =  small_category_product::all();
        $check = 0;

        foreach($large_category as $item){
            if($item->slug_name == $slug_name){
                $check = 1;
            }
        }

        foreach($small_category as $item){
            if($item->slug_name == $slug_name){
                $check = 2;
            }
        }

        if($check==1){
            $db = new large_category_product();
            $products = $db->join('product','product.id_large_category','large_category_product.id_large_category')->where('large_category_product.slug_name',$slug_name)->Paginate(12);
            return view('frontend.product.detail-category',compact('categories','products'));
        }else if($check==2){
            $db = new small_category_product();
            $products = $db->join('product','product.id_small_category','small_category_product.id_small_category')->where('small_category_product.slug_name',$slug_name)->Paginate(12);
            return view('frontend.product.detail-category',compact('categories','products'));
        }
    }
}
