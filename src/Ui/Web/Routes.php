<?php

namespace Fullsystem\Auth\Ui\Web;

use Illuminate\Contracts\Routing\Registrar;

class Routes
{
    /**
     * @param \Illuminate\Contracts\Routing\Registrar $router
     */
    public function map(Registrar $router)
    {
        $this->mapLoginRoutes($router);
        $this->mapResetRoutes($router);
    }

    /**
     * Map login routes
     *
     * @param $router
     */
    private function mapLoginRoutes($router)
    {
        $router->middleware('guest')->get('login', 'LoginController@showLoginForm')->name('login');
        $router->middleware('guest')->post('login', 'LoginController@login');

        $router->post('logout', 'LoginController@logout')->name('logout');
    }

    /**
     * Map reset routes
     *
     * @param $router
     */
    private function mapResetRoutes($router)
    {
        $router->middleware('guest')->get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        $router->middleware('guest')->get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');

        $router->middleware('guest')->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        $router->middleware('guest')->post('password/reset', 'ResetPasswordController@reset')->name('password.update');
    }
}
