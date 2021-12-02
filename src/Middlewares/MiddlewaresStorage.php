<?php

namespace Source\Middlewares;

/**
 * Interface for storage Middlewares
 */
interface MiddlewaresStorage
{
    /**
     * Set array of Middlewares
     *
     * @param array $middlewares
     *
     * @return mixed
     */
    public function setMiddlewares(array $middlewares);

    /**
     * Get array of Middlewares
     *
     * @return array Middlewares
     */
    public function getMiddlewares():array;
}