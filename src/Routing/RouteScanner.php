<?php

namespace Source\Routing;

use Source\Application\ConfigLoader;
use Source\FileScanner\Scanner;
use Source\Singletons\Singleton;

/**
 * Class for scanning .php files in route folder
 */
class RouteScanner extends Singleton implements Scanner
{
    /**
     * @var array<string> filenames
     */
    private array $routes = [];

    /**
     * Scan {app}/routes directory for files
     *
     * @return $this
     */
    public function scan(): RouteScanner
    {
        $config = ConfigLoader::getConfig(ConfigLoader::CONFIG_FILE_DIRECTORIES);
        $routeFiles = scandir($config['routes']);
        array_shift($routeFiles);
        array_shift($routeFiles);

        $this->routes = $routeFiles;
        return $this;
    }

    /**
     * Get all founded files
     *
     * @param bool $recursive try to find again
     *
     * @return array<string>
     */
    public function getFiles(bool $recursive = true): array
    {
        $files = $this->routes;
        if ($recursive && empty($files)) {
            $files = $this->scan()->getFiles(false);
        }

        return $files;
    }
}