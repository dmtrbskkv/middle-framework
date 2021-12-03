<?php

namespace Source\Application;

/**
 * Load any config from {app}/config folder
 */
class ConfigLoader
{
    /**
     * File with twig config
     */
    const CONFIG_FILE_TWIG = 'twig';
    /**
     * File with directories config
     */
    const CONFIG_FILE_DIRECTORIES = 'directories';
    /**
     * File with Template Engine configs
     */
    const CONFIG_FILE_TEMPLATE_ENGINE = 'template_engine';

    /**
     * File with app common configs
     */
    const CONFIG_FILE_APP = 'app';

    /**
     * File with db configuration
     */
    const CONFIG_FILE_DB = 'db';

    /**
     * Get data array from needed config file
     *
     * @param string $configName filename without .php
     *
     * @return array
     */
    public static function getConfig(string $configName): array
    {
        $filepath = __DIR__ . '/../../config/' . $configName . '.php';
        if (file_exists($filepath)) {
            return require $filepath;
        }

        return [];
    }
}