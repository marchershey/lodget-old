<?php

namespace App\View\Components\Inputs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Counter extends Component
{
    public $wiremodel;
    public $wiretarget;
    public $label;
    public $desc;
    public $step;
    public $min;
    public $max;

    /**
     * Create a new component instance.
     */
    public function __construct(string $wiremodel, string $wiretarget, string $label, string $desc = "", int $step = 1, int $min = 0, int $max = 99)
    {
        $this->wiremodel = $wiremodel;
        $this->wiretarget = $wiretarget;
        $this->label = $label;
        $this->desc = $desc;
        $this->step = $step;
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.inputs.counter');
    }
}
