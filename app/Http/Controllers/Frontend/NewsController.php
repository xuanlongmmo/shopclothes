<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    

use App\category_news;
use App\news;
use App\comment_news;

use App\Http\Requests\requestcontact;

class NewsController extends Controller
{
    //Tin tức
    public function news(){
        $categories = category_news::all();
        $news = news::orderBy('created_at', 'DESC')->paginate(9);
        return view('frontend.news.index',compact('categories','news'));
    }

    public function detailcategory($slug_name){
        $categories = category_news::all();
        $category = category_news::where('slug_name',$slug_name)->get();
        $news = news::where('id_category',$category[0]->id)->orderBy('created_at', 'DESC')->paginate(9);
        return view('frontend.news.detailcategory',compact('categories','news'));
    }  

    public function detailnews($id){
        $news = news::findOrFail($id);
        $categories = category_news::all();
        $list_comment = comment_news::where('id_news',$id)->orderBy('created_at', 'DESC')->paginate(2);
        $list_news = news::where('id_category',$news->id_category)->orderBy('created_at', 'DESC')->paginate(9);
        return view('frontend.news.detailnews',compact('news','categories','list_news','list_comment'));
    }

    public function postcomment(Request $request){
        if(Auth::check()){
            $create = comment_news::create([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'image' => $request->image,
                'content' => $request->content,
                'id_news' => $request->id_news,
            ]);
            return redirect()->back();
        }else{
            $create = comment_news::create([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'content' => $request->content,
                'id_news' => $request->id_news,
            ]);
            return redirect()->back();
        }
    }
}
