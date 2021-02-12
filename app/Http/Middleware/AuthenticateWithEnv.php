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
        if(env('USER_FIRSTNAME') <> "" && env('USER_LASTNAME') <> "" && env('USER_EMAIL') <> "" && env('USER_PASSWORD') <> "" && env('USER_NUMBER') <> "" && env('USER_BIRTHDATE') <> "" && env('ROLE') <> ""){
            //Test si l'utilsiateur du .env existe dans la DB
            if(User::where('email_address', '=', env('USER_EMAIL'))->exists()){
                //Test la connexion avec l'utilisateur du .env
                if(!Auth::attempt(['firstname' => env('USER_FIRSTNAME'), 'lastname' => env('USER_LASTNAME'), 'email_address' => env('USER_EMAIL'), 'member_number' => env('USER_NUMBER'), 'birthdate' => env('USER_BIRTHDATE'), 'password' => env('USER_PASSWORD'), 'role_id' => env('ROLE')])) {
                    return response('Erreur 409 : Accès refusée.', 409);
                }
            }else{
                //Création de l'utilisateur du .env
                Artisan::call("make:user ". env('USER_FIRSTNAME') ." ". env('USER_LASTNAME')." ". env('USER_EMAIL')." ". env('USER_NUMBER')." ". env('USER_BIRTHDATE')." ". env('USER_PASSWORD'). " ". env('ROLE'));
            }
        }else{
            return response('Erreur 409 : .env incomplet.', 409);
        }
        return $next($request);
    }
}
