<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')->middleware('api')->group(function () {

    Route::get('/routes', function () {
        $routes = [];
        $routesCollection = Route::getRoutes();

        foreach ($routesCollection as $route) {
            $routes[$route->getName()] = $route->uri();
        }

        return $routes;
    })->name('routes.list');
});