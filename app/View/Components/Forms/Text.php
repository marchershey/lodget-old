<?php

namespace App\View\Components\Forms;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Text extends Component
{
    public $label;
    public $model;
    public $desc;
    public $id;
    public $modelType;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $model, $desc = null, $id = null, $modelType = 'lazy')
    {
        $this->label = $label;
        $this->model = $model;
        $this->desc = $desc;
        $this->id = $id ?? Str::of($model)->replace('.', '-');
        $this->modelType = ($modelType == null) ? '' : '.' . $modelType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.text');
    }
}
