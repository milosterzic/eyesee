<?php


namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginController
{
    /**
     * Handle Social login request
     *
     * @return RedirectResponse
     */
    public function socialLogin() : RedirectResponse
    {
        return Socialite::driver('reddit')->redirect();
    }

    /**
     * Obtain the user information from Social Logged in.
     *
     * @return RedirectResponse
     */
    public function handleProviderCallback() : RedirectResponse
    {
        $redditUser = Socialite::driver('reddit')->user();

        $user = User::where('provider_id', $redditUser->getId())->first();

        if(! $user){
            $user = new User();

            $user->provider_id = $redditUser->getId();
            $user->email = $redditUser->getEmail();
            $user->name = $redditUser->getNickname();

            $user->save();
        }

        Auth::login($user);

        return redirect(route('welcome'));
    }

    /**
     * Handle Social login request
     *
     * @return RedirectResponse
     */
    public function logout() : RedirectResponse
    {
        Auth::logout();

        return redirect(route('welcome'));
    }
}
