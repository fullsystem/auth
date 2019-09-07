<?php

namespace Fullsystem\Auth;

use Illuminate\Support\Facades\Gate;
use Fullsystem\Core\Loaders\ContainerLoader;
use Fullsystem\Core\Loaders\RoutesLoader;
use Fullsystem\Core\Providers\FullsystemProvider;
use Illuminate\Support\Facades\URL;

class ServiceProvider extends FullsystemProvider
{
    use RoutesLoader;

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'Fullsystem\Auth\Models\User' => 'Fullsystem\Auth\Models\Policies\ModelPolicy',
    ];

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

        // Register Polices
        $this->registerPolicies();
    }
}
