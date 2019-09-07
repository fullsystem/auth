<?php

namespace Fullsystem\Auth\Ui\Web\Controllers;

use Fullsystem\Ship\Parents\Controllers\WebController;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends WebController
{
    use SendsPasswordResetEmails;

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
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('auth::guest.passwords.email');
    }
}
