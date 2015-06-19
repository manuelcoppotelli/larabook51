<?php

namespace Larabook\Http\Controllers\Auth;

use Larabook\User;
use Larabook\Jobs\RegisterUserJob;
use Illuminate\Support\Facades\Auth;
use Larabook\Http\Controllers\Controller;
use Larabook\Http\Requests\RegistrationRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    use AuthenticatesUsers;

    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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

        return redirect($this->redirectPath());
    }
}
