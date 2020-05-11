<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckHasBook
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->hasAnyBook()) {
            return $next($request);
        }
        return redirect()->route('book.create');
    }
}
