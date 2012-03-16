<?php
namespace Timers;

return array(
    'di' => array(
        'instance' => array(
            'alias' => array(
                'timers' => 'Timers\Controller\IndexController',
            ),
            'Timers\Controller\IndexController' => array(
                'parameters' => array(
                    'em' => 'doctrine_em'
                ),
            ),
            'orm_driver_chain' => array(
                'parameters' => array (
                    'drivers' => array (
                        'Timers' => array (
                            'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                            'namespace' => __NAMESPACE__ . '\Entity',
                            'paths' => array (
                                __DIR__ . '/../src/' . __NAMESPACE__ . '/Entity'
                            )
                        )
                    )
                )
            ),
            'Zend\View\PhpRenderer' => array(
                'parameters' => array(
                    'options' => array(
                        'script_paths' => array(
                            'timers' => __DIR__ . '/../views',
                        ),
                    )
                ),
            ),
    )),
);
