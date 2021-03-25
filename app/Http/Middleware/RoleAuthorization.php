<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class RoleAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles) // ...$roles make a array with the multiple options
    {
        if($request->user()->hasRole($roles)){
            return $next($request); 
        }
        return response('Unauthorized.', 401); // To do make pretty page
    }
}
