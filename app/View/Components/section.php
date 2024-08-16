<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class section extends Component
{
    
    public $hashtag;
    
    /**
     * Create a new component instance.
     */
    public function __construct ( $hashtag)
    {
        
        $this->hashtag =$hashtag;
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.section');
    }
}
