<?php

namespace Source\Routing\Facades;

use Source\Routing\Route;
use Source\Routing\RouteCollection;
use Source\Routing\Singletons\RouteCollectionSingleton;

class RouteCollectionFacade
{
    public function add(Route $route): RouteCollectionFacade
    {
        /** @var RouteCollectionSingleton $routeCollections */
        $routeCollections = RouteCollectionSingleton::getInstance();
        $routeCollections->addRoute($route);
        return $this;
    }

    public function group($groupName, $routes): RouteCollectionFacade
    {
        /** @var RouteCollectionSingleton $routeCollections */
        $routeCollections = RouteCollectionSingleton::getInstance();
        $routeCollections->addRouteGroup($groupName, $routes);
        return $this;
    }

    public function getCollection(): RouteCollection
    {
        return new RouteCollection;
    }
}