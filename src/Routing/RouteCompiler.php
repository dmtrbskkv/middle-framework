<?php

namespace Source\Routing;

use Exception;
use Source\Middlewares\Middleware;
use Source\Request\Request;
use Source\Routing\Exceptions\RouteMethodUnavailable;
use Source\Routing\Exceptions\RouteNotFound;

class RouteCompiler
{
    private array $parsedPath = [];
    private static RouteCollection $routeCollection;

    private function __construct()
    {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        $path = $protocol . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $this->parsedPath = parse_url($path);
    }

    /**
     * @throws RouteMethodUnavailable
     */
    private function execRoute(Route $route)
    {
        $callback = $route->getCallback();
        $request = Request::prepare();

        $middlewares = $route->getMiddlewares();
        for ($i = 0; $i < count($middlewares); $i++){
            $middleware = new $middlewares[$i];
            $next = isset($middlewares[($i + 1)]) ? new $middlewares[($i + 1)] : new Middleware;

            if(!$request->getMiddleware()){
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

    public static function prepare(RouteCollection $routes)
    {
        self::$routeCollection = $routes;
    }

    /**
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