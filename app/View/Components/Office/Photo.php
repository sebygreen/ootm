<?php

namespace App\View\Components\Office;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Photo extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public object $photo)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view("components.office.photo");
    }
}