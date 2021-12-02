<?php

namespace Source\Routing\Singletons;

use Source\Routing\Route;
use Source\Routing\RouteCollection;
use Source\Singletons\Singleton;

class RouteCollectionSingleton extends Singleton
{
    private array $routes = [];
    private array $routeGroups = [];

    public function addRoute(Route $route): RouteCollectionSingleton
    {
        if (!$this->getRoute($route->getPath())) {
            $this->routes[$route->getPath()] = $route;
        }

        return $this;
    }

    public function addRouteGroup($groupName, $routes): RouteCollectionSingleton
    {
        $this->routeGroups[$groupName] = $routes;

        /** @var Route $route */
        foreach ($routes as $route) {
            $this->addRoute($route);
        }

        return $this;
    }

    private function getRoute($path)
    {
        return $this->routes[$path] ?? false;
    }

    private function getRouteGroup($groupName)
    {
        return $this->routeGroups[$groupName] ?? false;
    }

    private function getRouteGroups(): array
    {
        return $this->routeGroups;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }
}