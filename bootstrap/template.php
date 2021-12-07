<?php

use Morce\Template\Factory\TemplateEngineFactory;

$twigConfig = function () {
    require_once __DIR__ . '/../config/twig.php';
};


function view($file, $data = []): ?string
{
    $templateEngine = TemplateEngineFactory::getTemplateEngine();
    return $templateEngine->view($file, $data);
}
