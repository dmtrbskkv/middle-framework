<?php

use Source\Application\ConfigLoader;
use Source\Template\Facades\TwigFacade;

return [
    'current' => ConfigLoader::CONFIG_FILE_TWIG,
    'available' => [
              ConfigLoader::CONFIG_FILE_TWIG => TwigFacade::class
    ]
];