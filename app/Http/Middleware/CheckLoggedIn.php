<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CheckLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {

        $session_user_id = Session::get("user_id");
        if (!$session_user_id   ) {
            // User is not logged in, redirect to login page or perform any other action
            return redirect('/login'); // Change this to your login route
        }

        // User is logged in, allow access to the admin panel
        return $next($request);
    }
}
