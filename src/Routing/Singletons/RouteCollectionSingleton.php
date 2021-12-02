<?php

namespace Source\Routing\Singletons;

use Source\Routing\Route;
use Source\Singletons\Singleton;

/**
 * Route Collection in single version
 */
class RouteCollectionSingleton extends Singleton
{
    /**
     * @var array<string, Route> List of routes
     */
    private array $routes = [];

    /**
     * @var array<string,array<Route>> Routes group where key = uri, value = Route
     */
    private array $routeGroups = [];

    /**
     * Add route in list of routes
     *
     * @param Route $route
     *
     * @return $this
     */
    public function addRoute(Route $route): RouteCollectionSingleton
    {
        if (!$this->getRoute($route->getPath())) {
            $this->routes[$route->getPath()] = $route;
        }

        return $this;
    }

    /**
     *  Add Route group
     *
     * @param string       $groupName
     * @param array<Route> $routes
     *
     * @return $this
     */
    public function addRouteGroup(string $groupName, array $routes): RouteCollectionSingleton
    {
        $this->routeGroups[$groupName] = $routes;

        /** @var Route $route */
        foreach ($routes as $route) {
            $this->addRoute($route);
        }

        return $this;
    }

    /**
     * Get single route by uri
     *
     * @param string $path
     *
     * @return null|Route
     */
    private function getRoute(string $path): ?Route
    {
        return $this->routes[$path] ?? null;
    }

    /**
     * Get single route group by name
     *
     * @param string $groupName
     *
     * @return array<Route>
     */
    private function getRouteGroup(string $groupName): array
    {
        return $this->routeGroups[$groupName] ?? [];
    }

    /**
     * Get all route group
     *
     * @return array<string,array<Route>>
     */
    private function getRouteGroups(): array
    {
        return $this->routeGroups;
    }

    /**
     * Get all routes
     *
     * @return array<Route>
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}