<?php

namespace Source\Routing;

class RouteFinder
{
    public static function matchRoutePath(Route $route, $path): bool
    {
        return $route->getPath() === $path;
    }
}