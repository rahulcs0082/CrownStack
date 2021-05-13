<?php

namespace CrownStack\CameraStore\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use CrownStack\CameraStore\Http\Middleware\Jwt;

class CameraStoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');

        // $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'camera');

        /* aliases */
        $router->aliasMiddleware('jwt', Jwt::class);
    }
}