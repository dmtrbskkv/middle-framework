<?php

namespace Source\Routing;

use ArrayIterator;
use \IteratorAggregate;
use Source\Routing\Singletons\RouteCollectionSingleton;

class RouteCollection implements IteratorAggregate
{
    /**
     * @return ArrayIterator<string, Route>
     * @see getRoutes()
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->getRoutes());
    }

    private function getRoutes(): array
    {
        /** @var RouteCollectionSingleton $singleton */
        $singleton = RouteCollectionSingleton::getInstance();
        return $singleton->getRoutes();
    }
}