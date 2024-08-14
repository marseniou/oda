<?php

namespace App\View\Components;

use Closure;
use App\Models\Concert;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ConcertItem extends Component
{
    public $concert;
    /**
     * Create a new component instance.
     */
    public function __construct(Concert $concert)
    {
        $this->concert = $concert;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.concert-item');
    }
}
