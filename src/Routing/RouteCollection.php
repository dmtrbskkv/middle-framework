<?php

namespace Source\Routing;

use ArrayIterator;
use \IteratorAggregate;

class RouteCollection implements IteratorAggregate
{
    private $routes;
    private $routeGroups;

    public function add(Route $route): RouteCollection
    {
        if (!$this->get($route->getPath())) {
            $this->routes[$route->getPath()] = $route;
        }
        return $this;
    }

    public function group($name, $routes): RouteCollection
    {
        $this->routeGroups[$name] = $routes;

        /** @var Route $route */
        foreach ($routes as $route) {
            $this->add($route);
        }

        return $this;
    }

    public function get($path)
    {
        return $this->routes[$path] ?? false;
    }

    /**
     * @return ArrayIterator<string, Route>
     * @see getRoutes()
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->getRoutes());
    }

    private function getRoutes()
    {
        return $this->routes;
    }
}