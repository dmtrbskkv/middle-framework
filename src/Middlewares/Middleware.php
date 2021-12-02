<?php

namespace Source\Middlewares;

use Source\Request\Request;

class Middleware implements MiddlewareHandler
{
    public function handle(Request $request, ?MiddlewareHandler $handler)
    {
        if ($handler !== null) {
            $handler->next($request);
        }
    }

    public function next(Request $request)
    {
        $request->setMiddleware($this);
    }
}