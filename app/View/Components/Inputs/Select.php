<?php

namespace App\View\Components\Inputs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    public $options;
    public $wiremodel;
    public $wiretarget;
    public $label;
    public $desc;

    /**
     * Create a new component instance.
     */
    public function __construct(array $options, string $wiremodel, string $wiretarget, string $label, string $desc = "")
    {
        $this->options = $options;
        $this->wiremodel = $wiremodel;
        $this->wiretarget = $wiretarget;
        $this->label = $label;
        $this->desc = $desc;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.inputs.select');
    }
}
