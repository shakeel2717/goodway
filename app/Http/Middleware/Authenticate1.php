<?php

namespace App\Http\Middleware;

use Closure;

class Authenticate1
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        if (!$request->session()->exists('admin')) {
            return redirect()->route('admin.login');
        }
        return $next($request);
    }
}