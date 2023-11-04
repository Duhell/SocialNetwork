<?php

namespace App\View\Components;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{

    public $name;
    public $time;
    public $picture;
    public $content;
    public $user;
    public $postId;
    public $likes;
    public $dislikes;
    public $comments;
    public function __construct($name,$time,$content,$picture,$user,$postId,$likes ,$dislikes,$comments)
    {
        $this->name = $name;
        $this->time = $time;
        $this->content = $content;
        $this->picture = $picture;
        $this->user = $user;
        $this->postId = $postId;
        $this->likes = $likes;
        $this->dislikes = $dislikes;
        $this->comments = $comments;
    }
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
