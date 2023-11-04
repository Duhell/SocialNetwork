<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(string $id)
    {
        $post = Post::find( $id );
        return response()->json($post->comments->load('user'));
    }

    public function store(Request $request){
        $comment = new Comments;
        $comment->user_id = Auth::id();
        $comment->post_id = $request->post_id;
        $comment->comment = $request->content;
        $comment->save();

        return response()->json($comment);
     }

}
