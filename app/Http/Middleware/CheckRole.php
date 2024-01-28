<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, String $role)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        if (Auth::user()->role == $role) {
            return $next($request);
        }

        return redirect('/');
    }
}
