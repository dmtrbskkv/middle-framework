<?php

namespace Source\Routing;

use ArrayIterator;
use \IteratorAggregate;
use Source\Routing\Singletons\RouteCollectionSingleton;

/**
 * Route Collection for "foreach"
 */
class RouteCollection implements IteratorAggregate
{
    /**
     * Iterator for "foreach"
     *
     * @return ArrayIterator<string, Route>
     * @see getRoutes()
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->getRoutes());
    }

    /**
     * Get list of routes from RouteCollectionSingleton
     *
     * @return array<Route>
     */
    private function getRoutes(): array
    {
        /** @var RouteCollectionSingleton $singleton */
        $singleton = RouteCollectionSingleton::getInstance();
        return $singleton->getRoutes();
    }
}