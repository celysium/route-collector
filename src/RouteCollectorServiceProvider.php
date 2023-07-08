<?php

namespace Celysium\RouteCollector;

use Illuminate\Support\ServiceProvider;

class RouteCollectorServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
    }
}