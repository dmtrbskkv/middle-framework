<?php

namespace Source\Middlewares;

/**
 * Interface for class with executing method for Middleware
 */
interface MiddlewareExecutable
{
    /**
     * Set Middleware for executable
     *
     * @param MiddlewareHandler $middleware
     *
     * @return mixed
     */
    public function setMiddleware(MiddlewareHandler $middleware);

    /**
     * Get Middleware for executable
     *
     * @return MiddlewareHandler|null
     */
    public function getMiddleware(): ?MiddlewareHandler;

    /**
     * Execute current Middleware and set next
     *
     * @param MiddlewareHandler|null $next next Middleware
     *
     * @return mixed
     */
    public function execMiddleware(?MiddlewareHandler $next);
}