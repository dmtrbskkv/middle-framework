<?php

namespace Source\Routing;

use Source\Middlewares\MiddlewaresStorage;

class Route implements MiddlewaresStorage
{
    private $path;
    private $callback;
    private $middlewares;

    public function __construct($path, $callback, $method = 'GET')
    {
        $this->setPath($path);
        $this->setCallback($callback);
    }

    public function setPath($path)
    {
        $this->path = $path;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setCallback($callback)
    {
        $this->callback = $callback;
    }

    public function getCallback()
    {
        return $this->callback;
    }

    public function setMiddlewares(array $middlewares): Route
    {
        $this->middlewares = $middlewares;
        return $this;
    }

    public function getMiddlewares()
    {
        return $this->middlewares;
    }
}