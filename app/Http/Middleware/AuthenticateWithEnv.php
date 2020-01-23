<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthenticateWithEnv
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
        dd('test');
        if(env('USER_FIRSTNAME') <> "" && env('USER_LASTNAME') <> "" && env('USER_EMAIL') <> "" && env('USER_PASSWORD') <> "" && env('USER_NUMBER') <> ""){
            //Test si l'utilsiateur du .env existe dans la DB
            if(User::where('firstname', '=', env('USER_FIRSTNAME'))->exists()){
                //Test la connexion avec l'utilisateur du .env
                if(!Auth::attempt(['name' => env('USER_NAME'), 'password' => env('USER_PASSWORD'), 'email' => env('USER_EMAIL')])) {
                    return response('Erreur 409 : Accès refusée.', 409);
                }
            }else{
                //Création de l'utilisateur du .env
                Artisan::call("make:user ". env('USER_NAME') ." ". env('USER_EMAIL')." ". env('USER_PASSWORD'));
            }
        }else{
            return response('Erreur 409 : .env incomplet.', 409);
        }
        return $next($request);
    }
}
