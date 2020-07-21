<?php

namespace App\Http\Middleware;

use Closure;

class CurrentUser
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
        if ( auth()->user()->id == $request->user->id ) {
            return $next($request);
        }
        return back()->with('status', 'User Not Allowed');
    }
}
