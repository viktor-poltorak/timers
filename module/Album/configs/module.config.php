<?php
namespace Album;

return array(
    'di' => array(
        'instance' => array(
            'alias' => array(
                'album' => 'Album\Controller\AlbumController',
            ),
            'Album\Controller\AlbumController' => array(
                'parameters' => array(
                    'em' => 'doctrine_em'
                ),
            ),
            'orm_driver_chain' => array(
                'parameters' => array (
                    'drivers' => array (
                        'Album' => array (
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
                            'album' => __DIR__ . '/../views',
                        ),
                    )
                ),
            ),
    )),
);
