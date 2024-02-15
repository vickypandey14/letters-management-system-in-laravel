<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if (is_null($user)) {
            // user is not logged in
            return redirect()->route('login');
        }
        elseif ($user->access_level != 1) {
            // user is not an admin
            return redirect()->route('home');
        }
        return $next($request);
    }
}