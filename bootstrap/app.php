<?php

require_once __DIR__ . '/../vendor/autoload.php';

spl_autoload_register(function ($class) {
    $class = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $class);
    $class = str_replace(['App/', 'Source'], ['app/', 'src'], $class);
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . $class . '.php';
});