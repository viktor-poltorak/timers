<?php

return array(
    'display_exceptions' => true,
    'di' => array(
        'instance' => array(
            'alias' => array(
                'get-timers' => 'Rest\Controller\TimersController',
                'info' => 'Rest\Controller\InfoController',
                'category' => 'Rest\Controller\CategoryController',
                'thumb' => 'Rest\Controller\ThumbController',
                'json-pp' => 'Rest\PostProcessor\Json',
                'image-pp' => 'Rest\PostProcessor\Image',
                'xml-pp' => 'Rest\PostProcessor\Xml',
            ),
            
            /*
             * инжекти доктрину в каждый контроллер вот через так 
             */
            'Rest\Controller\TimersController' => array(
                'parameters' => array(
                    'em' => 'doctrine_em'
                ),
            ),
            
            /*
             * драйвер
             */
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
            /*
             * конец инжекта
             */
            
            'Zend\Mvc\Router\RouteStack' => array(
                'parameters' => array(
                    'routes' => array(
                        'restful' => array(
                            'type' => 'Zend\Mvc\Router\Http\Segment',
                            'options' => array(
                                'route' => '/api/:controller[.:formatter][/:id]',
                                'constraints' => array(
                                    'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    'formatter' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    'id' => '[a-zA-Z0-9_-]*'
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
