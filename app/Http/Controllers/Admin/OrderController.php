<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\order;
use App\order_status;
use App\product;

class OrderController extends Controller
{
    public function order(){
        $data_order = order::all();
        $order_status = order_status::all();
        return view('admin.order.index',compact('data_order','order_status'));
    }

    public function detailorder($id){
        $data = order::find($id);
        $idproduct = '';
        foreach($data->listproduct as $item){
            if($idproduct == null){
                $idproduct = $item->id_product;
            }else{
                $idproduct = $idproduct.','.$item->id_product;
            }
        }
        $product = new product();
        $dataproduct = $product->whereRaw("id IN({$idproduct})")->get();
        return view('admin.order.detailorder',compact('data','dataproduct'));
    }

    public function updateorder($id,$status){
        $update = order::where('id',$id)->update([
            'id_status' => $status
        ]);
        return redirect(url("order/detailorder/$id"));
    }
}
