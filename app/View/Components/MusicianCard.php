<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MusicianCard extends Component
{
    public $name;
    public $slug;
    public $image;
    public $instrument;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $image, $instrument, $slug)
    {
        $this->name = $name;
        $this->image = $image;
        $this->slug = $slug;
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
