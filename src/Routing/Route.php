<?php

namespace Source\Routing;

use Closure;
use Source\Middlewares\MiddlewareHandler;
use Source\Middlewares\MiddlewaresStorage;

/**
 * Route class
 */
class Route implements MiddlewaresStorage
{
    /**
     * @var string URI
     */
    private string $path;

    /**
     * @var Closure|array Callback Closure or array of class and method
     */
    private $callback;

    /**
     * @var string HTTP method
     */
    private string $method;

    /**
     * @var array Middlewares
     */
    private array $middlewares = [];

    /**
     * @param string        $path     URI
     * @param Closure|array $callback Callback Closure or array of class and method
     * @param string        $method   HTTP method
     */
    public function __construct(string $path, $callback, string $method = 'GET')
    {
        $this->setPath($path);
        $this->setCallback($callback);
        $this->setMethod($method);
    }

    /**
     * Set URI for route
     *
     * @param string $path URI
     *
     * @return Route
     */
    public function setPath(string $path): Route
    {
        $this->path = $path;
        return $this;
    }

    /**
     * Get URI for route
     *
     * @return string Route URI
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Set callback for route
     *
     * @param Closure|array $callback
     */
    public function setCallback($callback): Route
    {
        $this->callback = $callback;
        return $this;
    }

    /**
     * Get route callback
     *
     * @return Closure|array Callback Closure or array of class and method
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * Set route HTTP method
     *
     * @param string $method HTTP method
     *
     * @return $this
     */
    public function setMethod(string $method): Route
    {
        $this->method = $method;
        return $this;
    }

    /**
     * Get route HTTP method
     *
     * @return string HTTP method
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Set array of middlewares
     *
     * @param array<MiddlewareHandler> $middlewares array of middlewares
     *
     * @return $this
     */
    public function setMiddlewares(array $middlewares): Route
    {
        $this->middlewares = $middlewares;
        return $this;
    }

    /**
     * Get route array of middlewares
     *
     * @return array<MiddlewareHandler>
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}