<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        if(is_null($request->user())){
            return redirect('home');
        }
        
        if(!$request->user()->hasRole($role)) {
            return redirect('home');
        }
        
        if($permission !== null && !$request->user()->can($permission)) {
            return redirect('home');
        }
            return $next($request);
        }
}
