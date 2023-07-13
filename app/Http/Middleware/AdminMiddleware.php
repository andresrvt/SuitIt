<?php

namespace App\Http\Middleware;


namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * @var
     */
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        // Check if user is an admin
        if (Auth::user() && Auth::user()->role == 'admin') {
        
            return $next($request);
        }

        return redirect('/login')->with('error', 'You are not authorized to access this page.');
    }
}
