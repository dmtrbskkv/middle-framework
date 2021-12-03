<?php

use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Source\Application;
use Source\Application\ConfigLoader;
use Doctrine\ORM\Mapping\AnsiQuoteStrategy;



$paths = [
    ConfigLoader::getConfig(ConfigLoader::CONFIG_FILE_DIRECTORIES)['models'],
];
$isDevMode = Application::isDevelopMode();


$dbParams = ConfigLoader::getConfig(ConfigLoader::CONFIG_FILE_DB);

$ORMConfig = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$ORMConfig->setQuoteStrategy(new AnsiQuoteStrategy());

$entityManager = EntityManager::create($dbParams, $ORMConfig);