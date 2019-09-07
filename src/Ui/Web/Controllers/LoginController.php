<?php

namespace Fullsystem\Auth\Ui\Web\Controllers;

use Fullsystem\Ship\Parents\Controllers\WebController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends WebController
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth::guest.login');
    }
}
