<?php

namespace Fullsystem\Auth\Ui\Web;

use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\Config;

class Routes
{
    /**
     * @param Registrar $router
     */
    public function map(Registrar $router)
    {
        $this->mapLoginRoutes($router);
        $this->mapResetRoutes($router);

        if (Config::get('auth.register')) {
            $this->mapRegisterRoutes($router);
        }

        if (Config::get('auth.verify')) {
            $this->mapVerificationRoutes($router);
        }
    }

    /**
     * Map login routes
     *
     * @param $router
     */
    private function mapLoginRoutes($router)
    {
        $router->get('login', 'LoginController@showLoginForm')->name('login');
        $router->post('login', 'LoginController@login')->name('login');

        $router->post('logout', 'LoginController@logout')->name('logout');
    }

    /**
     * Map reset routes
     *
     * @param $router
     */
    private function mapResetRoutes($router)
    {
        $router->get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        $router->get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');

        $router->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        $router->post('password/reset', 'ResetPasswordController@reset')->name('password.update');
    }

    /**
     * Map reset routes
     *
     * @param $router
     */
    private function mapRegisterRoutes($router)
    {
        $router->get('register', 'RegisterController@showRegistrationForm')->name('register');
        $router->post('register', 'RegisterController@register');
    }

    /**
     * Map reset routes
     *
     * @param $router
     */
    private function mapVerificationRoutes($router)
    {
        $router->get('email/verify', 'VerificationController@show')->name('verification.notice');
        $router->get('email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify');
        $router->post('email/resend', 'VerificationController@resend')->name('verification.resend');
    }
}
