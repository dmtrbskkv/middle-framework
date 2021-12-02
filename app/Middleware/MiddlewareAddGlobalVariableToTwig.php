<?php

namespace App\Middleware;

use Source\Application\ConfigLoader;
use Source\Middlewares\Middleware;
use Source\Middlewares\MiddlewareHandler;
use Source\Request\Request;
use Source\Template\Factory\TemplateEngineFactory;

class MiddlewareAddGlobalVariableToTwig extends Middleware
{
    public function handle(Request $request, ?MiddlewareHandler $handler)
    {
        $templateEngine = TemplateEngineFactory::getTemplateEngine();

        $templateConfig = ConfigLoader::getConfig(ConfigLoader::CONFIG_FILE_TEMPLATE_ENGINE);

        $templateEngine::appendStaticData(['middlewareData' => ['version', '0.1']]);
        $templateEngine::appendStaticData(['templateEngine' => $templateConfig]);
        parent::handle($request, $handler);
    }

}