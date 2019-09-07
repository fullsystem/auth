<?php

namespace Fullsystem\Auth;

use Fullsystem\Core\Loaders\ContainerLoader;
use Fullsystem\Core\Loaders\RoutesLoader;
use Fullsystem\Core\Providers\FullsystemProvider;

class ServiceProvider extends FullsystemProvider
{
    use RoutesLoader;

    /**
     * Service Boot.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/Ui/Web/Views', 'auth');
        $this->loadWebRouteFrom(__NAMESPACE__);
    }

    /**
     * Service Register.
     */
    public function register()
    {
    }
}
