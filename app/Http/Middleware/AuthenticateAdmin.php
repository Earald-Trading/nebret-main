<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  array  $guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next,...$guards)
    {
        if (Auth::is_admin()) {
            return $next($request);
        }

        throw new AuthenticationException(
            'Unauthenticated.', $guards, route('login')
        );
    }
}
