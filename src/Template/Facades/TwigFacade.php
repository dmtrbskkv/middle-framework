<?php

namespace Source\Template\Facades;

use Source\Application\ConfigLoader;
use Source\Template\Drivers\Twig;
use Source\Template\Factory\TemplateEngine;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Facade for Twig Template Engine
 */
class TwigFacade implements TemplateFacade, TemplateEngine
{
    /**
     * @var array Static data, like global data object
     */
    private static array $staticData = [];

    /**
     * Return HTML code of rendered template
     *
     * @param string $file
     * @param array  $data
     *
     * @return string|null
     */
    public function view(string $file, array $data): ?string
    {
        $driver = new Twig();

        $driver->setConfig(ConfigLoader::getConfig(ConfigLoader::CONFIG_FILE_TWIG));
        $driver->setFile($this->getFilename($file));
        $driver->setData(array_merge(self::getStaticData(), $data));

        try {
            return $driver->render();
        } catch (LoaderError | SyntaxError | RuntimeError $e) {
            return null;
        }
    }

    /**
     * Add data to static data array
     *
     * @param array $data
     *
     * @return void
     */
    public static function appendStaticData(array $data): void
    {
        self::$staticData = array_merge(self::$staticData, $data);
    }

    /**
     * Get Static data array
     *
     * @return array
     */
    public static function getStaticData(): array
    {
        return self::$staticData;
    }

    /**
     * Get filename extensions
     *
     * @param string $file
     *
     * @return string
     */
    private function getFilename(string $file): string
    {
        $config = ConfigLoader::getConfig(ConfigLoader::CONFIG_FILE_TWIG);

        if (file_exists($config['views'] . '/' . $file . '.php')) {
            $file .= '.php';
        } elseif (file_exists($config['views'] . '/' . $file . '.twig')) {
            $file .= '.twig';
        }

        return $file;
    }


}