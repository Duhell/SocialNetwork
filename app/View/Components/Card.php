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
    public function __construct($name,$time,$content,$picture)
    {
        $this->name = $name;
        $this->time = $time;
        $this->content = $content;
        $this->picture = $picture;
    }
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
