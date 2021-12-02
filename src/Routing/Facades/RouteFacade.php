<?php

namespace Source\Routing\Facades;

use Closure;
use Source\Routing\Route;

/**
 * Facade for Route
 */
class RouteFacade
{
    /**
     * Add route for GET method
     *
     * @param string        $path     url
     * @param Closure|array $callback Closure or Class(Controller) with method
     *
     * @return Route
     */
    public static function GET(string $path, $callback): Route
    {
        return new Route($path, $callback, 'GET');
    }

    /**
     * Add route for POST method
     *
     * @param string        $path     url
     * @param Closure|array $callback Closure or Class(Controller) with method
     *
     * @return Route
     */
    public static function POST(string $path, $callback): Route
    {
        return new Route($path, $callback, 'POST');
    }

    /**
     * Add redirect route
     *
     * @param string $from redirect from
     * @param string $to   redirect to
     *
     * @return Route
     */
    public static function REDIRECT(string $from, string $to): Route
    {
        return new Route($from, function () use ($to) {
            header('Location: ' . $to);
        });
    }
}