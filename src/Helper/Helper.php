<?php

namespace Celysium\RouteCollector\Helper;

class Helper
{
    private const ignoredRoutesPrefix = [
        'l5-swagger',
        'sanctum',
        'ignition',
        'routes'
    ];

    public static function isUnwantedRoute($route): array
    {
        return array_filter(self::ignoredRoutesPrefix, function ($ignoredRoute) use ($route) {
            return str_starts_with($route, $ignoredRoute);
        });
    }
}
