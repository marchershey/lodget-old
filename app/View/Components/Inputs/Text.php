<?php

namespace App\View\Components\Inputs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Text extends Component
{
    public $wiremodel;
    public $wiretarget;
    public $label;
    public $desc;
    public $type;
    public $class;
    public $max;

    /**
     * Create a new component instance.
     */
    public function __construct(string $wiremodel, string $wiretarget, string $label, string $desc = "", string $type = "text", string $class = "", int $max = 0)
    {
        $this->wiremodel = $wiremodel;
        $this->wiretarget = $wiretarget;
        $this->label = $label;
        $this->desc = $desc;
        $this->type = $type;
        $this->class = $class;
        $this->max = $max;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.inputs.text');
    }
}
