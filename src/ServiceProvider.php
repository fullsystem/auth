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
        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/Data/Migrations');

        // Load views
        $this->loadViewsFrom(__DIR__ . '/Ui/Web/Views', 'auth');

        // Load routes
        $this->loadWebRouteFrom(__NAMESPACE__);
    }

    /**
     * Service Register.
     */
    public function register()
    {
    }
}
