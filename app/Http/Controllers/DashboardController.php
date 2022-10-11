<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function redirect()
    {
        $user = auth()->user();

        if ($user->can('view-admin-dashboard')) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->can('view-host-dashboard')) {
            return redirect()->route('host.dashboard');
        }

        if ($user->can('view-guest-dashboard')) {
            return redirect()->route('guest.dashboard');
        }

        return abort(500);
    }
}
