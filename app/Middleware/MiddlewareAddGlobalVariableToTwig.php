<?php

namespace App\Middleware;

use Source\Middlewares\Middleware;
use Source\Middlewares\MiddlewareHandler;
use Source\Request\Request;
use Source\Template\Factory\TemplateEngineFactory;

class MiddlewareAddGlobalVariableToTwig extends Middleware
{
    public function handle(Request $request, ?MiddlewareHandler $handler)
    {
        $templateEngine = TemplateEngineFactory::getTemplateEngine();
        $templateEngine::appendStaticData(['version', '0.1']);
        parent::handle($request, $handler);
    }

}