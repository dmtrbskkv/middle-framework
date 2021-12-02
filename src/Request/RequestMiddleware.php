<?php

namespace Source\Request;

use Source\Middlewares\MiddlewareHandler;

trait RequestMiddleware
{
    private MiddlewareHandler $middleware;
    private array $middlewaresAddHistory = [];
    private array $middlewaresExecHistory = [];

    public function setMiddleware(MiddlewareHandler $middleware)
    {
        if (!in_array($middleware, $this->middlewaresAddHistory)) {
            $this->middleware = $middleware;
            $this->middlewaresAddHistory[] = $middleware;
        }
    }

    public function getMiddleware(): ?MiddlewareHandler
    {
        return $this->middleware ?? null;
    }

    public function execMiddleware(?MiddlewareHandler $next)
    {
        $middleware = $this->getMiddleware();
        if (!in_array($middleware, $this->middlewaresExecHistory)) {
            $this->middleware->handle($this, $next);
            $this->middlewaresExecHistory[] = $middleware;
        }
    }
}