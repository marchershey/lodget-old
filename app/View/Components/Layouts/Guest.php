<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class Guest extends Component
{
    public $pageTitle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pageTitle = "pageTitle not set")
    {
        $this->pageTitle = $pageTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.guest');
    }
}
