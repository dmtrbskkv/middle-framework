<?php

namespace Source\Routing;

/**
 * Class for find route in current URI
 */
class RouteFinder
{
    /**
     * Compare route URI and site URI
     *
     * @param Route  $route
     * @param string $path current URI
     *
     * @return bool
     */
    public static function matchRoutePath(Route $route, $path): bool
    {
        return $route->getPath() === $path;
    }
}