<?php

namespace Fullsystem\Auth\Ui\Web\Controllers;

use Fullsystem\Ship\Parents\Controllers\WebController;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends WebController
{
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        $this->middleware('guest');
    }
    
    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth::guest.passwords.reset')->with([
            'email' => $request->email,
            'token' => $token,
        ]);
    }
}
