<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\section;
use App\section_content;
use App\product;

class SectionController extends Controller
{
    public function getsection(){
        $sections = section::all();
        return view('admin.section.index',compact('sections'));
    }

    public function addsection(){
        $products = product::all();
        return view('admin.section.add',compact('products'));
    }

    public function postaddsection(Request $request){
        $maxID = section::max('id');
        $section = new section();
        
        //Lưu section
        $section->id = $maxID + 1;
        $section->name = $request->name;
        $section->type = $request->type;
        $section->save();

        //Lưu danh sách sản phẩm
        foreach($request->product as $item){
            $section_content = new section_content();
            $section_content->id_section = $maxID+1;
            $section_content->id_product = $item;
            $section_content->save();
        }
        return redirect()->route('admin.section');
    }

    public function editsection($id){
        $products = product::all();
        $section = section::find($id);
        return view('admin.section.edit',compact('section','products'));
    }

    public function posteditsection(Request $request){ 
        $sections = section::find($request->id);
        $sections->update([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        $section_content = section_content::where('id_section',$request->id)->delete();
        foreach($request->product as $item){
            $section_content = new section_content();
            $section_content->id_section = $request->id;
            $section_content->id_product = $item;
            $section_content->save();
        }
        return redirect()->route('admin.section');
    }

    public function deletesection($id){
        $delete = section::find($id)->delete();
        return redirect()->route('admin.section');
    }
}
