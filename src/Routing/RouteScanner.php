<?php

namespace Source\Routing;

use Source\Application\ConfigLoader;
use Source\FileScanner\Scanner;
use Source\Singletons\Singleton;

class RouteScanner extends Singleton implements Scanner
{
    private $routes = [];

    public function scan(): RouteScanner
    {
        $config = ConfigLoader::getConfig(ConfigLoader::CONFIG_FILE_DIRECTORIES);
        $routeFiles = scandir($config['routes']);
        array_shift($routeFiles);
        array_shift($routeFiles);

        $this->routes = $routeFiles;
        return $this;
    }

    public function getFiles($recursive = true): array
    {
        $files = $this->routes;
        if ($recursive && empty($files)) {
            $files = $this->scan()->getFiles(false);
        }

        return $files;
    }
}