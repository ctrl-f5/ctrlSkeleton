<?php
return array(
    'modules' => array(
        'DoctrineModule',
        'DoctrineORMModule',
        'App',
        'CtrlBlog',
        'CtrlAuth',
        'Ctrl',
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            './vendor',
            'App' => './module/App/',
            'CtrlBlog' => './vendor/ctrl-f5/ctrlBlog/',
            'CtrlAuth' => './vendor/ctrl-f5/ctrlAuth/',
            'Ctrl' => './vendor/ctrl-f5/ctrllib/',
        ),
    ),
    'view_manager' => array(
        'display_exceptions'       => true,
    ),
);
