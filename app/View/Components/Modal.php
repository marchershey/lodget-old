<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $title;
    public $show;
    public $close;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($show, $close, $title = "")
    {
        $this->title = $title;
        $this->show = $show;
        $this->close = $close;
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
