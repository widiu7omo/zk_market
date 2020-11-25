<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Customer
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() && !Auth::user()->hasRole('Customer')) {
            return abort(401, 'Anda tidak diperbolehkan mengakses halaman dengan akun ini.');
        }
        return $next($request);
    }
}
