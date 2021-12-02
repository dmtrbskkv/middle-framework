<?php

namespace Source\Middlewares;

interface MiddlewaresStorage
{
    public function setMiddlewares(array $middlewares);

    public function getMiddlewares();
}