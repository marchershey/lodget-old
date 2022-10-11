<?php

namespace App\View\Components\Forms;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Select extends Component
{
    public $label;
    public $model;
    public $options = [];
    public $selected;
    public $desc;
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $model, $options, $selected = null, $desc = null, $id = null)
    {
        $this->label = $label;
        $this->model = $model;
        $this->options = $options;
        $this->selected = $selected;
        $this->desc = $desc;
        $this->id = $id ?? Str::of($model)->replace('.', '-');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.select');
    }
}
