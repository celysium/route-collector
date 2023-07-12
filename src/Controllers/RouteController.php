<?php

namespace Celysium\RouteCollector\Controllers;

use Celysium\RouteCollector\Helper\Helper;
use Illuminate\Support\Facades\Route;

class RouteController
{
    public function index(): array
    {
        $routes = [];
        $routesCollection = Route::getRoutes();

        foreach ($routesCollection as $route) {
            if (!Helper::isUnwantedRoute($route->getName())) {
                $routes[$route->getName()] = $route->uri();
            }
        }

        return $routes;
    }
}
