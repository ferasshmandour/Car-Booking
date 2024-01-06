<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthCheckMiddlewar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $guard)
    {
        // Check if the user is authenticated for the specified guard
        if (!Auth::guard($guard)->check()) {
            // Redirect the user to the appropriate sign-in route based on the guard
            return $this->redirectToSignIn($guard);
        }

        return $next($request);
    }

    private function redirectToSignIn($guard)
    {
        // Customize the redirect route based on the guard
        switch ($guard) {
            case 'admin':
                return redirect()->route('admin-sign-in');
            case 'web':
                return redirect()->route('index');
                // Add more cases for additional guards as needed

            default:
                return redirect()->route('aaaa'); // Default redirect route
        }
    }
}
