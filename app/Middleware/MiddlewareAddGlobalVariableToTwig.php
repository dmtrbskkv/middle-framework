<?php

use Source\Middlewares\Middleware;
use Source\Middlewares\MiddlewareHandler;
use Source\Request\Request;

class MiddlewareAddGlobalVariableToTwig extends Middleware
{
    public function handle(Request $request, ?MiddlewareHandler $handler)
    {
        parent::handle($request, $handler);
    }

}