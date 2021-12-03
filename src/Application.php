<?php

namespace Source;

use Source\Application\ConfigLoader;
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

    /**
     * Compare env key in app.php config file with dev values
     *
     * @return bool
     */
    public static function isProductionMode(): bool
    {
        $config = ConfigLoader::getConfig(ConfigLoader::CONFIG_FILE_APP);
        return !in_array(
            trim($config['env']),
            ['local', 'dev', 'develope', 'develop']
        );
    }

    /**
     * Invert function isProductionMode()
     *
     * @return bool
     */
    public static function isDevelopMode(): bool
    {
        return !self::isProductionMode();
    }
}