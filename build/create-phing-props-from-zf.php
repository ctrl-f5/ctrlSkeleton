<?php

use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Symfony\Component\Console\Helper\HelperSet;

ini_set('display_errors', 1);
error_reporting(E_ALL);

$dir = dirname(__FILE__);
$file = $dir.'/build.properties';

if ((file_exists($file) && !is_writable($file)) || !is_writable($dir))
    throw new \Exception('cant write file: '.$file);

/** @var $app \Zend\Mvc\ApplicationInterface */
$app = include '../init.app.php';

/** @var $em \Doctrine\ORM\EntityManager */
$em = $app->getServiceManager()->get('doctrine.entitymanager.orm_default');

$props = array(
    'build' => array(
        'dir' => './',
    ),
    'db' => array(),
    'progs' => array(
        'mysql' => '/usr/bin/mysql',
    ),
);

$props['db'] = array(
    'host' => $em->getConnection()->getHost(),
    'port' => $em->getConnection()->getPort(),
    'name' => $em->getConnection()->getDatabase(),
    'user' => $em->getConnection()->getUsername(),
    'pass' => $em->getConnection()->getPassword(),
);

array_unshift($props['build'], '# build info');
array_unshift($props['db'], '# database info');
array_unshift($props['progs'], '# program paths');

$lines = array();
foreach ($props as $cat => $p) {
    foreach ($p as $k => $v)
        if (strpos($v, '#') === 0) $lines[] = $v.PHP_EOL;
        else $lines[] = $cat.'.'.$k.'='.$v.PHP_EOL;
}

file_put_contents(
    $file,
    $lines
);