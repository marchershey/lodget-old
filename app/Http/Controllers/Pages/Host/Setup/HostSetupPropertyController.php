<?php

namespace App\Http\Controllers\Pages\Host\Setup;

use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class HostSetupPropertyController extends Component
{
    use WireToast;
    public $property;
    public function render()
    {
        return view('pages.host.setup.property');
    }

    public function test()
    {
        toast()->debug($this->property)->push();
    }
}
