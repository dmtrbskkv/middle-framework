<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Morce\Application;
use Morce\Application\ConfigLoader;

// Set up Morce Framework
ConfigLoader::setAppDirectory(realpath(__DIR__ . '/../'));

// Bootstrapping modules
require_once __DIR__ . '/../bootstrap/app.php';
require_once __DIR__ . '/../bootstrap/http.php';
require_once __DIR__ . '/../bootstrap/doctrine.php';
require_once __DIR__ . '/../bootstrap/routes.php';
require_once __DIR__ . '/../bootstrap/template.php';

// Run application
(new Application())->run();


