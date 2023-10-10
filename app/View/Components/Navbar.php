<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $details;
    public function __construct($details)
    {
        $this->details = $details;
    }

    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
