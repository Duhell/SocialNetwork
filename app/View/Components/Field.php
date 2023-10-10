<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Field extends Component
{
    public $title;
    public $type;
    public function __construct($title,$type)
    {
        $this->title = $title;
        $this->type = $type;
    }

    public function render(): View|Closure|string
    {
        return view('components.field');
    }
}
