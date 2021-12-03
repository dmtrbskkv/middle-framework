<?php
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../bootstrap/doctrine.php';

use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\ORM\EntityManager;
use Source\Application\ConfigLoader;

/** @var EntityManager $entityManager */
//return ConsoleRunner::createHelperSet($entityManager);

$config = new PhpFile(ConfigLoader::getFilePath(ConfigLoader::CONFIG_FILE_MIGRATION));
return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));