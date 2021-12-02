<?php

namespace Source\Routing\Facades;

use Source\Routing\Route;
use Source\Routing\RouteCollection;
use Source\Routing\Singletons\RouteCollectionSingleton;

/**
 * Facade for RouteCollection, which has arrayed of Route
 */
class RouteCollectionFacade
{
    /**
     * Add route to Singleton Route Collection
     *
     * @param Route $route
     *
     * @return $this
     */
    public function add(Route $route): RouteCollectionFacade
    {
        /** @var RouteCollectionSingleton $routeCollections */
        $routeCollections = RouteCollectionSingleton::getInstance();
        $routeCollections->addRoute($route);
        return $this;
    }

    /**
     * Add group of routes to Singleton Route Collection
     *
     * @param $groupName
     * @param $routes
     *
     * @return $this
     */
    public function group($groupName, $routes): RouteCollectionFacade
    {
        /** @var RouteCollectionSingleton $routeCollections */
        $routeCollections = RouteCollectionSingleton::getInstance();
        $routeCollections->addRouteGroup($groupName, $routes);
        return $this;
    }

    /**
     * Get Singleton
     *
     * @return RouteCollection
     */
    public function getCollection(): RouteCollection
    {
        return new RouteCollection;
    }
}