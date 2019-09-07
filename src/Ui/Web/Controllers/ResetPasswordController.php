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
}
