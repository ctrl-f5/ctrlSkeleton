<?php

namespace App;

return array(
    'controllers' => array(
        'invokables' => array(
            'App\Controller\Index' => 'App\Controller\IndexController'
        ),
    ),
    'domain_services' => array(
        'invokables' => array(
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'         => __DIR__ . '/../view/layout/layout.phtml',
            'error/404'             => __DIR__ . '/../view/error/404.phtml',
            'error/index'           => __DIR__ . '/../view/error/index.phtml',
            'error/index'           => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'acl' => array(
        'resources' => array(
            'AppResources' => 'App\Permissions\Resources'
        )
    ),
    'doctrine' => array(
        'driver' => array(
            'app_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\XmlDriver',
                    'cache' => 'array',
                    'paths' => array(__DIR__.'/../src/Domain', __DIR__.'/entities')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'App\Domain' => 'app_driver'
                )
            )
        ),
    ),
    'navigation' => array(
        'app' => array(
            array(
                'label' => 'Home',
                'route' => 'default/default',
                'type' => 'Ctrl\Navigation\Page\Mvc',
                'resource' => 'menu.App',
                'params' => array(
                    'controller' => 'index',
                    'action' => 'index',
                ),
            ),
        ),
    )
);
