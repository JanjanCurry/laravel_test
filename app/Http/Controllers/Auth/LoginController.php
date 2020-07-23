<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Hash;
use Socialite;
use Str;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
     public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        // $user->token;
        // if the user doesn't exist add them or automatic register if they do exist, get then model and authenticate and redirect to dashboard
        $user = User::firstOrCreate([
            'email' => $user->email
        ],
        [
            'name' => $user->nickname,
            'password' => Hash::make('password'),
            'project_id' => 0
        ]);
        Auth::login($user, true);
        return redirect('/dashboard');
        //return dd($user);
    }
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleFacebookProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        // $user->token;
        // if the user doesn't exist add them or automatic register if they do exist, get then model and authenticate and redirect to dashboard
        $user = User::firstOrCreate([
            'email' => $user->email
        ],
        [
            'name' => $user->name,
            'password' => Hash::make('password'),
            'project_id' => 0
        ]);
        Auth::login($user, true);
        return redirect('/dashboard');
      //  return dd($user);
    }
public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleProviderCallback()
    {
        $user = Socialite::driver('google')->user();

        // $user->token;
        // if the user doesn't exist add them or automatic register if they do exist, get then model and authenticate and redirect to dashboard
        // $user = User::firstOrCreate([
        //     'email' => $user->email
        // ],
        // [
        //     'name' => $user->nickname,
        //     'password' => Hash::make('password'),
        //     'project_id' => 0
        // ]);
        // Auth::login($user, true);
        // return redirect('/dashboard');
        return dd($user);
    }

}
