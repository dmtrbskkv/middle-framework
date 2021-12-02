<?php

namespace Source\Middlewares;

use Source\Request\Request;

/**
 * Base Interface for Middleware
 */
interface MiddlewareHandler
{
    /**
     * Handle current request and do any what you want
     *
     * @param Request                $request HTTP Request
     * @param MiddlewareHandler|null $handler Next Middleware
     *
     * @return mixed
     */
    public function handle(Request $request, ?MiddlewareHandler $handler);

    /**
     * Set Current Middleware as next Middleware for current HTTP Request
     *
     * @param Request $request HTTP Request
     *
     * @return mixed
     */
    public function next(Request $request);
}