<?php

use Source\Application;

require_once __DIR__ . '/../bootstrap/app.php';
require_once __DIR__ . '/../bootstrap/http.php';
require_once __DIR__ . '/../bootstrap/doctrine.php';
require_once __DIR__ . '/../bootstrap/routes.php';
require_once __DIR__ . '/../bootstrap/template.php';


(new Application())->run();


