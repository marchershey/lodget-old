<?php

namespace App\View\Components\Inputs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    public $wiremodel;
    public $wiretarget;
    public $label;
    public $desc;
    public $rows;

    /**
     * Create a new component instance.
     */
    public function __construct(string $wiremodel, string $wiretarget, string $label, string $desc = "", int $rows = 4)
    {
        $this->wiremodel = $wiremodel;
        $this->wiretarget = $wiretarget;
        $this->label = $label;
        $this->desc = $desc;
        $this->rows = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.inputs.textarea');
    }
}
