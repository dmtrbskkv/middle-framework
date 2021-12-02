<?php

use Source\Template\Factory\TemplateEngineFactory;

$twigConfig = function () {
    require_once __DIR__ . '/../config/twig.php';
};


function view($file, $data = [])
{
    $templateEngine = TemplateEngineFactory::getTemplateEngine();
    return $templateEngine->view($file, $data);
}
