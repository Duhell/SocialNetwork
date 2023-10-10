<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function feeds(Request $request){
        $details = Auth::user();

        if($request->ajax()){
            $feeds = Post::all()->sortByDesc('created_at');
            return view('LoginUserViews.feeds',['feeds'=>$feeds])->render();
        }else{
            $feeds = Post::all()->sortByDesc('created_at');
            return view('LoginUserViews.user',['bio'=>$details,'feeds'=>$feeds]);
        }
    }
    public function addpost(Request $request){
        if($request->content_msg != "" || $request->content_msg != null){
            $post = new Post;
            $post->content = $request->content_msg;
            $post->user_id = auth()->user()->id;
            $post->save();
        }
        return redirect()->back();
    }

}
