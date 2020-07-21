<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Controller;
use App\User;


use Socialite;

class AuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {

        return Socialite::driver('github')->stateless()->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('github')->stateless()->user();
        } catch (Exception $e) {
            return Redirect::to('auth/github');
        }

        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);

        return Redirect::to('/');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $githubUser
     * @return User
     */
    private function findOrCreateUser($githubUser)
    {
        if ($authUser = User::where('github_id', $githubUser->id)->first()) {
            return $authUser;
        }

        if($githubUser->name){
            return User::create([
                'firstname' => $githubUser->name,
                'email_address' => $githubUser->email,
                'github_id' => $githubUser->id,
            ]);
        }else{
            return User::create([
                'firstname' => $githubUser->nickname,
                'email_address' => $githubUser->email,
                'github_id' => $githubUser->id,
            ]);
        }
    }

    public function logoutUser(){
        Auth::logout();
        return Redirect::to('/');
    }
}
