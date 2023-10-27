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
        if($request->input('content_msg') != "" || $request->input('content_msg') != null){
            $post = new Post;
            $post->content = $request->input('content_msg');
            $post->user_id = auth()->user()->id;
            $post->save();
        }
        return response()->json(['successPost'=>'Post successfully.']);
    }

    public function destroy(string $id){
        $post = Post::find($id);
        if($post){
            $post->delete();
            return response()->json(['status'=>'success']);
        }
        return response()->json(['status'=>'error']);
    }

}
