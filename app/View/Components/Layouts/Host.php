<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class Host extends Component
{
    public $asideTop;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($asideTop = false)
    {
        $this->asideTop = $asideTop;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.host');
    }
}
