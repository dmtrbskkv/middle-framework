<?php

use Source\Application;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

$twigConfig = function () {
    require_once __DIR__ . '/../config/twig.php';
};


function view($filename, $data = [])
{
    $config = Application::getConfig('twig');

    $loader = new FilesystemLoader($config['views']);
    $twig = new Environment($loader, []);

    if (file_exists($config['views'] . '/' . $filename . '.php')) {
        $filename .= '.php';
    } elseif (file_exists($config['views'] . '/' . $filename . '.twig')) {
        $filename .= '.twig';
    }

    try {
        return $twig->render($filename, $data);
    } catch (LoaderError | RuntimeError | SyntaxError $e) {
        abort($e->getMessage(), 500);
    }
}
