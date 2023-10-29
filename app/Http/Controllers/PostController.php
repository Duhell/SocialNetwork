<?php

namespace App\Http\Controllers;

use App\Models\Dislikes;
use App\Models\Likes;
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

    public function addLike(Request $request,Post $post){
        $existingLike = Likes::where('user_id',Auth::id())->where('post_id', $post->id)->first();
        if($existingLike === null){
            $like = new Likes;
            $like->user_id = Auth::id();
            $like->post_id = $post->id;
            $like->save();
        }else{
            $existingLike->delete();
        }
        return response()->json(['likeCounts'=> Likes::where('user_id',Auth::id())->count()]);
    }
    public function addDislike(Request $request,Post $post){
        $existingDisLike = Dislikes::where('user_id',Auth::id())->where('post_id', $post->id)->first();
        if($existingDisLike === null){
            $dislike = new Dislikes;
            $dislike->user_id = Auth::id();
            $dislike->post_id = $post->id;
            $dislike->save();
        }else{
            $existingDisLike->delete();
        }
        return response()->json(['dislikeCounts'=> Dislikes::where('user_id',Auth::id())->count()]);
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
