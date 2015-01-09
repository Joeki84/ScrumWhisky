<?php

require_once './vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\SimplifiedYamlDriver;

// ---------------->  Doctrine
$isDevMode = false;

// Doctrine
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'php_usr',
    'password' => 'Appel.Sap',
    'dbname'   => 'whisky',
);

$paths = array("/config/doctrine/");
$config = Setup::createYAMLMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);


// ---------------->  YAML

// $config instanceof Doctrine\ORM\Configuration
$driver = new YamlDriver(array('/config/'));
$config->setMetadataDriverImpl($driver);
