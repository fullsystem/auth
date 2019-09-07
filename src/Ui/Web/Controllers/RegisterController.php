<?php

namespace Fullsystem\Auth\Ui\Web\Controllers;

use Fullsystem\Auth\Models\User;
use Fullsystem\Auth\Ui\Web\Requests\Register;
use Fullsystem\Ship\Parents\Controllers\WebController;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends WebController
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth::guest.register');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param Register $register
     * @param array $data
     * @return User
     */
    protected function create(Register $register, array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
