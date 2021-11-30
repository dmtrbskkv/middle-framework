<?php

namespace Source\Routing;

class RouteFinder
{
    public static function matchRoutePath(Route $route, $path)
    {
        return $route->getPath() === $path;
    }
}