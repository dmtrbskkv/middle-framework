<?php

namespace Source;

use Source\Routing\RouteCompiler;

class Application
{
    public function run($output = true)
    {
        $app = null;
        try {
            $app = RouteCompiler::run();
        } catch (Routing\Exceptions\RouteMethodUnavailable $e) {
            abort(null, 503);
        } catch (Routing\Exceptions\RouteNotFound $e) {
            abort(null, 404);
        }

        if ($output) {
            echo $app;
        }
    }

    public static function getConfig($configName): array
    {
        $filepath = __DIR__ . '/../config/' . $configName . '.php';
        if (file_exists($filepath)) {
            return require $filepath;
        }

        return [];
    }
}