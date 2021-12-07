<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Morce\Application;
use Morce\Application\ConfigLoader;
use Doctrine\ORM\Mapping\AnsiQuoteStrategy;



$paths = [
    ConfigLoader::getConfig(ConfigLoader::CONFIG_FILE_DIRECTORIES)['models'],
];
$isDevMode = Application::isDevelopMode();


$dbParams = ConfigLoader::getConfig(ConfigLoader::CONFIG_FILE_DB);

$ORMConfig = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$ORMConfig->setQuoteStrategy(new AnsiQuoteStrategy());

$entityManager = EntityManager::create($dbParams, $ORMConfig);