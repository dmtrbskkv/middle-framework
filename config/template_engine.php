<?php

use Morce\Application\ConfigLoader;
use Morce\Template\Facades\TwigFacade;

return [
    'current' => ConfigLoader::CONFIG_FILE_TWIG,
    'available' => [
              ConfigLoader::CONFIG_FILE_TWIG => TwigFacade::class
    ]
];