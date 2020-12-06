<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlockedUser
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
        if (auth()->user()) {
            if (auth()->user()->isBlocked()) {
                $login = auth()->user()->login;
                auth()->logout();
                return redirect()->route('login')
                    ->with(['alert-error' => __('User <strong>' . $login
                        . '</strong> is blocked. Please contact with administrator.')]);
            }
        }

        return $next($request);
    }
}
