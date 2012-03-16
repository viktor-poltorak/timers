<?php

return array(
    'modules' => array(
        'Album',
        'Timers',
        'Application',
        'ZfcBase',
        'ZfcUser',
        'DoctrineModule',
        'DoctrineORMModule',
        'TwitterBootstrapFormDecorators',
        'Rest'
    ),
    'module_listener_options' => array(
        'config_cache_enabled' => false,
        'cache_dir'            => 'data/cache',
        'module_paths' => array(
            './module',
            './vendor',
        ),
    ),
);
