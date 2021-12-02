<?php

namespace Source\Application;

class ConfigLoader
{
    const CONFIG_FILE_TWIG = 'twig';
    const CONFIG_FILE_DIRECTORIES = 'directories';

    public static function getConfig($configName): array
    {
        $filepath = __DIR__ . '/../../config/' . $configName . '.php';
        if (file_exists($filepath)) {
            return require $filepath;
        }

        return [];
    }
}