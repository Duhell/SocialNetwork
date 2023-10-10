<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tolink extends Component
{
    public $title;
    public $link;
    public function __construct($link,$title)
    {
        $this->link = $link;
        $this->title = $title;
    }
    public function render(): View|Closure|string
    {
        return view('components.tolink');
    }
}
