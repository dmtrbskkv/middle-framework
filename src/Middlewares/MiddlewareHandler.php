<?php

namespace Source\Middlewares;

use Source\Request\Request;

interface MiddlewareHandler
{
public function handle(Request $request, ?MiddlewareHandler $handler);
public function next(Request $request);
}