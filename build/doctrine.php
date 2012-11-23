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

ConsoleRunner::run($helperSet);