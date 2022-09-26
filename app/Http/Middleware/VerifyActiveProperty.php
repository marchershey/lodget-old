<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyActiveProperty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session('active-property')) {
            // If no properties found, redirect to create property

            // If at least one property found, redirec to property selector

            return redirect()->route('host.setup.property');
        }

        return $next($request);
    }
}
