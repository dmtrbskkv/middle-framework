<?php

namespace Source\Middlewares;

interface MiddlewareExecutable
{
    public function setMiddleware(MiddlewareHandler $middleware);

    public function getMiddleware(): ?MiddlewareHandler;

    public function execMiddleware(?MiddlewareHandler $next);
}