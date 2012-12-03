#!/usr/bin/env php
<?php

use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Symfony\Component\Console\Helper\HelperSet;

/** @var $app \Zend\Mvc\ApplicationInterface */
$app = include '../init.app.php';

/** @var $em \Doctrine\ORM\EntityManager */
$em = $app->getServiceManager()->get('doctrine.entitymanager.orm_default');

$helperSet = new HelperSet(array(
    'db' => new ConnectionHelper($em->getConnection()),
    'em' => new EntityManagerHelper($em)
));

$classes = $em->getMetadataFactory()->getAllMetadata();
$schemaTool = new \Doctrine\ORM\Tools\SchemaTool($em);
$sql = $schemaTool->getCreateSchemaSql($classes);
$filtered = array();
foreach ($sql as $key => $line) {
    if (strpos($line, 'DROP TABLE') !== false && strpos($line, 'changelog') !== false) {
        unset($sql[$key], $line);
        continue;
    }
    $sql[$key] = $line.';'.PHP_EOL;
}
$sql[] = PHP_EOL;
$sql[] = '--//@UNDO';
$sql[] = PHP_EOL;
$sql[] = PHP_EOL;

if (false == file_put_contents(__DIR__.'/db/delta/001.sql', $sql)) {
    return 1;
}
return 0;