<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\product;
use App\import_goods;
use App\detail_product;

class RevenueController extends Controller
{
    public function list_import(){
        $data = import_goods::all();
        return view('admin.revenue.list_import',compact('data'));
    }

    public function import_goods(){
        $data_product = product::all();
        return view('admin.revenue.import_goods',compact('data_product'));
    }

    public function postimport_goods(Request $request){
        $create = import_goods::insert([
            'price' => $request->price,
            'size' => $request->size,
            'quantity' => $request->quantity,
            'id_user' => Auth::user()->id,
            'id_product' => $request->id_product,
        ]);
        
        $check = 0;
        $data = detail_product::where('id_product',$request->id_product)->get();
        foreach($data as $item){
            if($item->size == $request->size){
                $check = 1;
            }
        }

        if($check==1){
            $product = detail_product::where('id_product',$request->id_product)->where('size',$request->size)->get();
            $newquantity = $product[0]->quantity + $request->quantity;
            $update = detail_product::where('id_product',$request->id_product)->where('size',$request->size)->update([
                'quantity' => $newquantity
            ]);
        }else{
            $insert = detail_product::insert([
                'id_product' => $request->id_product,
                'size' => $request->size,
                'quantity' => $request->quantity
            ]);
        }
        return redirect()->route('admin.list_import');
    }

    public function getsales(){
        return view('admin.revenue.sales');
    }
}
