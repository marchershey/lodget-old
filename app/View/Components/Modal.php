<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $title;
    public $showFunction;
    public $closeFunction;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($showFunction, $closeFunction, $title = "")
    {
        $this->title = $title;
        $this->showFunction = $showFunction;
        $this->closeFunction = $closeFunction;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
