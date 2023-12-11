<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ((int)auth()->user()->role !== User::ROLE_ADMIN){
            abort(404);
        }
        return $next($request);
    }
}
