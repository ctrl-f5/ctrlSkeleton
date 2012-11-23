<?php
return array(
    'modules' => array(
        'DoctrineModule',
        'DoctrineORMModule',
        'App',
        'Ctrl\Module\Auth',
        'Ctrl'
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            'Ctrl\Blog' => './module/CtrlBlog/',
            './vendor',
            'Ctrl\Module\Auth' => './vendor/ctrl-f5/ctrlAuth/',
            'Ctrl' => './vendor/ctrl-f5/ctrllib/',
        ),
    ),
    'view_manager' => array(
        'display_exceptions'       => true,
    ),
);
