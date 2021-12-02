<?php

namespace Source\Template\Drivers;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

/**
 * Twig Template Engine Driver
 */
class Twig extends CommonDriver implements Driver
{

    /**
     * @var array config from config/twig.php file
     */
    private static array $configTwig;

    /**
     * Render Twig Template
     *
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function render(): string
    {
        $config = $this->getConfig();
        $view = $this->getFile();
        $data = $this->getData();


        $loader = new FilesystemLoader($config['views']);
        $twig = new Environment($loader, []);
        return $twig->render($view, $data);
    }


    /**
     * Get twig Config
     *
     * @return array
     */
    public function getConfig(): array
    {
        return self::$configTwig;
    }

    /**
     * Set twig Config
     *
     * @param array $config
     */
    public function setConfig(array $config)
    {
        self::$configTwig = $config;
    }


}