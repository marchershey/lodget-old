<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $showFunction;
    public $closeFunction;
    public $size;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($showFunction, $closeFunction, $size = "small")
    {
        $this->showFunction = $showFunction;
        $this->closeFunction = $closeFunction;
        $this->size = $size;
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
