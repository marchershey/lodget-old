<?php

namespace App\Http\Controllers\Host\Dashboard;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class DashboardController extends Component
{
    use WireToast;

    /**
     * Return the Host Dashboard view
     *
     * @return View view
     */
    public function render(): View
    {
        return view('pages.host.dashboard.host-dashboard-page');
    }

    public function testToast()
    {
        toast()->success('push')->push();
        toast()->success('pushOnNextPage')->pushOnNextPage();
    }
}
