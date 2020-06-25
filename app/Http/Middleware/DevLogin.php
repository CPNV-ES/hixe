<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DevLogin
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
    if (env('USER_ID', false)) {
      $user = User::find(env('USER_ID'));
      if ($user)
        if (Auth::attempt(['email_address' => $user->email_address, 'password' => 'Pa$$w0rd']))
          return $next($request);
        else
          return redirect('http://intranet.cpnv.ch/connexion');
      else
        return redirect('http://intranet.cpnv.ch/connexion');
    } else error_log("Prod");

    return $next($request);
  }
}
