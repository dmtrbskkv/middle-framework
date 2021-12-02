<?php

namespace Source\Routing\Facades;

use Source\Routing\Route;

class RouteFacade
{
    public static function GET($path, $callback): Route
    {
        return new Route($path, $callback, 'GET');
    }

    public static function POST($path, $callback): Route
    {
        return new Route($path, $callback, 'POST');
    }

    public static function REDIRECT($from, $to): Route
    {
        return new Route($from, function () use ($to){
            header('Location: ' . $to);
        });
    }
}