<?php

namespace App\Http\Controllers\Pages\Host;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class HostDashboardController extends Component
{
    /**
     * Return the Host Dashboard view
     *
     * @return View view
     */
    public function render(): View
    {
        return view('pages.host.dashboard');
    }
}
