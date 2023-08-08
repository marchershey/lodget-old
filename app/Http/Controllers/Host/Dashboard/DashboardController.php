<?php

namespace App\Http\Controllers\Host\Dashboard;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class DashboardController extends Component
{
    /**
     * Return the Host Dashboard view
     *
     * @return View view
     */
    public function render(): View
    {
        return view('pages.host.dashboard.host-dashboard-page');
    }
}
