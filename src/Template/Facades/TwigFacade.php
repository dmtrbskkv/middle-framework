<?php

namespace Source\Template\Facades;

use Source\Application\ConfigLoader;
use Source\Template\Drivers\Twig;
use Source\Template\Factory\TemplateEngine;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class TwigFacade implements TemplateFacade, TemplateEngine
{
    private static array $staticData = [];

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

    public static function appendStaticData($data)
    {
        self::$staticData = array_merge(self::$staticData, $data);
    }

    public static function getStaticData(): array
    {
        return self::$staticData;
    }

    private function getFilename($file)
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