<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\addnews;

use App\news;
use App\category_news;

class NewsController extends Controller
{
    public function getnews(){
        $list_news = news::orderBy('created_at', 'DESC')->get();
        return view('admin.news.index',compact('list_news'));
    }

    public function deletenews($id){
        $delete = news::where('id',$id)->delete();
        return redirect()->route('admin.news');
    }

    public function addnews(){
        $categories = category_news::all();
        return view('admin.news.add',compact('categories'));
    }

    public function postaddnews(addnews $request){
        $imageName = time().'_'.$request->image->getClientOriginalName();
        $request->image->move(public_path('sources/img/news'), $imageName);
        $db = new news();
        $db->title = $request->title;
        $db->content = $request->editor1;
        $db->link_image = 'sources/img/news/'.$imageName;
        $db->id_category = $request->category;
        $db->id_user = Auth::user()->id;
        $db->status = $request->status;
        $db->save();
        return redirect()->route('admin.news');
    }

    public function editnews($id){
        $news = news::find($id);
        $categories = category_news::all();
        return view('admin.news.edit',compact('categories','news'));
    }

    public function posteditnews(Request $request){
        $id = $request->id;
        if(!empty($request->image)){
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('sources/img/news'), $imageName);
            $update = news::where('id',$id)->update([
                'id_category' => $request->category,
                'title' => $request->title,
                'content' => $request->editor1,
                'link_image' => 'sources/img/news/'.$imageName,
                'status' => $request->status,
            ]);
        }else{
            $update = news::where('id',$id)->update([
                'id_category' => $request->category,
                'title' => $request->title,
                'status' => $request->status,
                'content' => $request->editor1,
            ]);
        }
        return redirect()->route('admin.news');
    }
}
