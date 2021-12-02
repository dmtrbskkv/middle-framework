<?php

namespace Source;

use Source\Routing\RouteCompiler;

/**
 * Base class for Application
 */
class Application
{
    /**
     * Run App
     *
     * @param bool $output Show HTML
     */
    public function run(bool $output = true)
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
}