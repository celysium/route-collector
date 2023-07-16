<?php

namespace Celysium\RouteCollector\Controllers;

use Celysium\RouteCollector\Helper\Helper;
use Celysium\RouteCollector\Requests\RoutesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RouteController
{
    public function index(RoutesRequest $request): array
    {
        $routes = [];

        $routesCollection = Route::getRoutes();

        foreach ($routesCollection as $route) {
            $routes[$route->getName()] = $route->uri();
        }

        if ($request->has('only')) {
            $filter = $request->input('only');

            return $this->only($routes, $filter);
        }

        if ($request->has('except')) {
            $filter = $request->input('except');
            return $this->except($routes, $filter);
        }

        return $routes;
    }

    /**
     * @param $routes
     * @param $onlyArray
     * @return array
     */
    private function only($routes, $onlyArray): array
    {
        return array_filter($routes, function ($url, $name) use ($onlyArray) {
            return array_filter($onlyArray, function ($only) use ($name) {
                return str_starts_with($name, $only);
            });
        }, ARRAY_FILTER_USE_BOTH);
    }

    /**
     * @param $routes
     * @param $exceptArray
     * @return array
     */
    private function except($routes, $exceptArray): array
    {
        return array_filter($routes, function ($url, $name) use ($exceptArray) {
            return !array_filter($exceptArray, function ($except) use ($name) {
                return str_starts_with($name, $except);
            });
        }, ARRAY_FILTER_USE_BOTH);
    }
}