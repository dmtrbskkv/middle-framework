<?php

namespace Source\Template\Drivers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Twig implements TemplateDriver
{

    private static $configTwig;
    private $file = null;
    private array $data = [];

    /**
     * @throws \Twig\Error\SyntaxError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\LoaderError
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

    public function setFile($file)
    {
        $this->file = $file;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setData(array $data)
    {
        $this->data = $data;
    }

    public function getData(): array
    {
        return $this->data;
    }


    public function getConfig()
    {
        return self::$configTwig;
    }

    public function setConfig($config)
    {
        self::$configTwig = $config;
    }


}