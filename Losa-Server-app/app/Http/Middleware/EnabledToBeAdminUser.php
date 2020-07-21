<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class EnabledToBeAdminUser
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
        $user = User::whereEmail( $request->route()->parameters() )->firstOrFail();
        if ($user->role == 'user' || $user->updated_at->diff( now() )->h >= 1) {
            return redirect('/');
        }
        $user->update(['role' => 'admin']);
        return $next($request);
    }
}
