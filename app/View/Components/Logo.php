<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Logo extends Component
{
    public $theme;
    public $showText;
    public $textSize;
    public $iconSize;
    public $iconTextColor;
    public $iconBgColor;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($theme = "light", $showText = true, $iconSize = "w-8 h-8", $textSize = "2xl", $iconBgColor = "primary", $iconTextColor = "white")
    {
        $this->theme = $theme;
        $this->showText = $showText;
        $this->textSize = $textSize;
        $this->iconSize = $iconSize;
        $this->iconTextColor = $iconTextColor;
        $this->iconBgColor = $iconBgColor;
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
