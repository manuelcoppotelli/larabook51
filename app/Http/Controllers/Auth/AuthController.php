<?php

namespace Larabook\Http\Controllers\Auth;

use Larabook\User;
use Larabook\Jobs\RegisterUserJob;
use Illuminate\Support\Facades\Auth;
use Larabook\Http\Controllers\Controller;
use Larabook\Http\Requests\SignInRequest;
use Larabook\Http\Requests\RegistrationRequest;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    /**
     * Create a new authentication controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param SignInRequest $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(SignInRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->has('remember'))) {
            flash()->success('Welcome back!');
            return redirect()->intended(route('statuses'));
        }

        flash()->error('Invalid credentials');

        return redirect()->route('login_path');
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        Auth::logout();

        return redirect()->route('home');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param RegistrationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(RegistrationRequest $request)
    {
        extract($request->only('name', 'email', 'password'));

        $user = $this->dispatch(new RegisterUserJob($name, $email, $password));

        Auth::login($user);

        flash()->overlay('Glad to have you as a new Larabook member!');

        return redirect()->route('home');
    }
}
