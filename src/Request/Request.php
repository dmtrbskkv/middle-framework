<?php

namespace Source\Request;

use Source\Middlewares\MiddlewareExecutable;

class Request implements MiddlewareExecutable
{
    use RequestQuery;
    use RequestMiddleware;

    public static function prepare(): Request
    {
        return new self();
    }
}