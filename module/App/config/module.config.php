<?php

namespace Ctrl\Blog;

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
        )
    ),
    'doctrine' => array(
        'driver' => array(
            'app_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\XmlDriver',
                    'cache' => 'array',
                    'paths' => array(__DIR__.'/../src/App/Domain', __DIR__.'/entities')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'App\Domain' => 'app_driver'
                )
            )
        ),
    )

);
