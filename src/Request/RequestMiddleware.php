<?php

namespace Source\Request;

use Source\Middlewares\MiddlewareHandler;

/**
 * Request methods for Middlewares
 */
trait RequestMiddleware
{
    /**
     * @var MiddlewareHandler current Middleware
     */
    private MiddlewareHandler $middleware;
    /**
     * @var array added Middleware history
     */
    private array $middlewaresAddHistory = [];
    /**
     * @var array  executable Middleware history
     */
    private array $middlewaresExecHistory = [];

    /**
     * Set current Middleware
     *
     * @param MiddlewareHandler $middleware
     */
    public function setMiddleware(MiddlewareHandler $middleware)
    {
        if (!in_array($middleware, $this->middlewaresAddHistory)) {
            $this->middleware = $middleware;
            $this->middlewaresAddHistory[] = $middleware;
        }
    }

    /**
     * Get current Middleware
     *
     * @return MiddlewareHandler|null
     */
    public function getMiddleware(): ?MiddlewareHandler
    {
        return $this->middleware ?? null;
    }

    /**
     * Execute current Middleware and set next Middleware
     *
     * @param MiddlewareHandler|null $next
     */
    public function execMiddleware(?MiddlewareHandler $next)
    {
        $middleware = $this->getMiddleware();
        if (!in_array($middleware, $this->middlewaresExecHistory)) {
            $this->middleware->handle($this, $next);
            $this->middlewaresExecHistory[] = $middleware;
        }
    }
}