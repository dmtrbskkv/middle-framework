<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Source\Application;
use Source\Application\ConfigLoader;

$paths = [
   ConfigLoader::getConfig(ConfigLoader::CONFIG_FILE_DIRECTORIES)['models']
];
$dbParams = ConfigLoader::getConfig(ConfigLoader::CONFIG_FILE_DB);


$config = Setup::createAnnotationMetadataConfiguration($paths, Application::isDevelopMode());
$entityManager = EntityManager::create($dbParams, $config);