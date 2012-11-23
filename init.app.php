<?php
/**
 * make sure everything is relative to the application root.
 */
define('APPLICATION_ROOT', __DIR__);
chdir(APPLICATION_ROOT);

// Setup autoloading
include 'init_autoloader.php';

// Run the application!
return Zend\Mvc\Application::init(include 'config/application.config.php');
