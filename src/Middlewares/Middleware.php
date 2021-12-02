<?php

namespace Source\Middlewares;

use Source\Request\Request;

/**
 * Main class for Middleware
 */
abstract class Middleware implements MiddlewareHandler
{
    /**
     * Handle Request and any what you need
     *
     * @param Request                $request HTTP Request
     * @param MiddlewareHandler|null $handler Next Middleware handler
     */
    public function handle(Request $request, ?MiddlewareHandler $handler)
    {
        if ($handler !== null) {
            $handler->next($request);
        }
    }

    /**
     * Set next Middleware
     *
     * @param Request $request
     */
    public function next(Request $request)
    {
        $request->setMiddleware($this);
    }
}