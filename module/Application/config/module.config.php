<?php

return array(
    'layout' => 'layouts/layout.phtml',
    'display_exceptions' => true,
    'di' => array(
        'instance' => array(
            'alias' => array(
                'index' => 'Application\Controller\IndexController',
                'error' => 'Application\Controller\ErrorController',
                'view' => 'Zend\View\Renderer\PhpRenderer',
            ),
            'Zend\View\PhpRenderer' => array(
                'parameters' => array(
                    'resolver' => 'Zend\View\TemplatePathStack',
                    'options' => array(
                        'script_paths' => array(
                            'application' => __DIR__ . '/../views',
                        ),
                    ),
                ),
            ),
            'Application\Controller\IndexController' => array(
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
        ),
    ),
    'routes' => array(
        'default' => array(
            'type' => 'Zend\Mvc\Router\Http\Segment',
            'options' => array(
                'route' => '/[:controller[/:action]]',
                'constraints' => array(
                    'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                ),
                'defaults' => array(
                    'controller' => 'index',
                    'action' => 'index',
                ),
            ),
        ),
        'home' => array(
            'type' => 'Zend\Mvc\Router\Http\Literal',
            'options' => array(
                'route' => '/',
                'defaults' => array(
                    'controller' => 'index',
                    'action' => 'index',
                ),
            ),
        ),
    ),
);
