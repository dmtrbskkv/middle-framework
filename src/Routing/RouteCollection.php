<?php

namespace Source\Routing;

use ArrayIterator;
use \IteratorAggregate;

class RouteCollection implements IteratorAggregate
{
    private $routes;

    public function add(Route $route)
    {
        $this->routes[$route->getPath()] = $route;
    }

    /**
     * @return ArrayIterator<string, Route>
     * @see getRoutes()
     */
    public function getIterator()
    {
        return new ArrayIterator($this->getRoutes());
    }

    private function getRoutes()
    {
        return $this->routes;
    }
}