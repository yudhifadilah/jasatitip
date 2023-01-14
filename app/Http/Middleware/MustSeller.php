<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MustSeller
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
        if( !auth()->check()) {
            return redirect('/');
        }
        if(auth()->roles()->where('title', 'user')->count() > 10) {
            return redirect('/');
        }
        return $next();
    }
}
