<?php

namespace Source\Template\Factory;

use Source\Application\ConfigLoader;
use Source\Template\Facades\TemplateFacade;

class TemplateEngineFactory
{
    public static function getTemplateEngine():TemplateFacade
    {
        $config = ConfigLoader::getConfig(ConfigLoader::CONFIG_FILE_TEMPLATE_ENGINE);
        $currentTemplateEngine = $config['current'];
        return new $config['available'][$currentTemplateEngine];
    }
}