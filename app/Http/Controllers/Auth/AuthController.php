<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;

class AuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {
        try {
            $user = Socialite::driver('github')->user();
        } catch (\Exception $e) {
            return Redirect::to('auth/github');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        // Prevent session fixation
        $request->session()->regenerate();

        return Redirect::to('/');
    }
    
    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $github_user
     * @return User
     */
    private function findOrCreateUser($github_user)
    {
        $user = User::where('github_id', $github_user->id)->first();
        
        if (isset($user)) {
            return $user;
        }

        // The role_id column cannot be empty
        $hiker_role = Role::hiker();

        $user = User::create([
            'firstname' => $github_user->nickname,
            'email_address' => $github_user->email,
            'github_id' => $github_user->id,
            'role_id' => $hiker_role->id,
        ]);

        return $user;
    }

    public function logoutUser(){
        Auth::logout();
        return Redirect::to('/');
    }
}
