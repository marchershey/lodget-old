<?php

namespace App\Http\Controllers\Pages\Admin;

use App\Models\PropertyType;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class AdminSettingsController extends Component
{
    use WireToast;

    public function render()
    {
        return view('pages.admin.admin-settings');
    }

    public function load($section)
    {
        $loadSection = 'load' . $section;
        $this->$loadSection();
    }

    public function loadProperties()
    {
        $this->emit('loadPropertyTypes');
        # code...
    }
}
