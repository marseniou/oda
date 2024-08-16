<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MusicianCard extends Component
{
    public $name;
    public $image;
    public $instrument;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $image, $instrument)
    {
        $this->name = $name;
        $this->image = $image;
        $this->instrument = $instrument;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.musician-card');
    }
}
