<?php

namespace Source\Routing;

use Source\Request\Request;
use Source\Routing\Exceptions\RouteMethodUnavailable;
use Source\Routing\Exceptions\RouteNotFound;

/**
 * A class that gathers routes into one system and run them
 */
class RouteCompiler
{
    /**
     * @var array Current URL data
     */
    private array $parsedPath = [];
    /**
     * @var RouteCollection Collection of Route
     */
    private static RouteCollection $routeCollection;

    /**
     * Get full URL and parse
     */
    private function __construct()
    {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        $path = $protocol . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $this->parsedPath = parse_url($path) ?? [];
    }

    /**
     * Run Route callback
     *
     * @throws RouteMethodUnavailable
     */
    private function execRoute(Route $route)
    {
        $callback = $route->getCallback();
        $request = Request::prepare();

        $middlewares = $route->getMiddlewares() ?? [];
        for ($i = 0; $i < count($middlewares); $i++) {
            $middleware = new $middlewares[$i];
            $next = isset($middlewares[($i + 1)]) ? new $middlewares[($i + 1)] : null;

            if (!$request->getMiddleware()) {
                $request->setMiddleware($middleware);
            }

            $request->execMiddleware($next);
        }

        if (is_array($callback) && count($callback) === 2) {
            $class = new $callback[0];
            $method = $callback[1];
            return $class->$method($request);
        } elseif (is_object($callback) && get_class($callback) === \Closure::class) {
            return $callback($request);
        } else {
            throw new RouteMethodUnavailable();
        }
    }

    /**
     * Save routes collection to static $routeCollection
     *
     * @param RouteCollection $routes
     */
    public static function prepare(RouteCollection $routes)
    {
        self::$routeCollection = $routes;
    }

    /**
     * Find route for current URI and run callback
     *
     * @throws RouteMethodUnavailable
     * @throws RouteNotFound
     */
    public static function run(RouteCollection $routes = null)
    {
        $routeCompiler = new self();

        $currentPath = $routeCompiler->parsedPath['path'];
        $routes = $routes ?? self::$routeCollection;

        /** @var Route $route */
        foreach ($routes as $route) {
            if (!RouteFinder::matchRoutePath($route, $currentPath)) {
                continue;
            }
            return $routeCompiler->execRoute($route);
        }
        throw new RouteNotFound;
    }


}