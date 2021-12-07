<?php

namespace App\Middleware;

use Morce\Application\ConfigLoader;
use Morce\Middlewares\Middleware;
use Morce\Middlewares\MiddlewareHandler;
use Morce\Request\Request;
use Morce\Template\Factory\TemplateEngineFactory;

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