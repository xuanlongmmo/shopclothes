<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;    

use App\banner;

class BannerController extends Controller
{
    public function getbanner(){
        $banners = banner::All(); 
        return view('admin.banner.index',compact('banners'));
    }

    public function editbanner($id){
        $banner = banner::find($id);
        return view('admin.banner.edit',compact('banner'));
    }

    public function posteditbanner(Request $request){
        $banner = banner::find($request->id);
        $banner->update([
            'title' => $request->title, 
            'infor' => $request->infor, 
            'link'=> $request->link, 
            'link_image' => $request->link_image, 
            'description' => $request->description, 
        ]);
        return redirect()->route('admin.banner');
    }
}
