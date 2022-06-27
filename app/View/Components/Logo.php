<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Logo extends Component
{
    public $theme;
    public $showText;
    public $iconSize;
    public $textSize;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($theme = "light", $showText = true, $iconSize = "w-8 h-8", $textSize = "2xl")
    {
        $this->theme = $theme;
        $this->showText = $showText;
        $this->iconSize = $iconSize;
        $this->textSize = $textSize;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.logo');
    }
}
