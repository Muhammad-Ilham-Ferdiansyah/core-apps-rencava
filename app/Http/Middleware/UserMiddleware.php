<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
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
        if (Auth::check() && Auth::user()->is_banned) {
            $banned = Auth::user()->is_banned == "1";
            Auth::logout();

            if ($banned == 1) {
                $message = 'Your account not activated. Please contact Admin.';
                return redirect()->route('login')
                    ->with('is_banned', $message)
                    ->withErrors(['email' => 'Your account not activated. Please contact Admin.']);
            }
        }
        return $next($request);
    }
}
