<?php

namespace Rest\PostProcessor;

abstract class AbstractPostProcessor
{

    protected $_vars = null;

    /**
     * @var null|\Zend\Http\Response
     */
    protected $_response = null;

    /**
     *
     * @param Zend\View\Model\ViewModel $vars
     * @param \Zend\Http\Response $response 
     */
    public function __construct(\Zend\View\Model\ViewModel $vars, \Zend\Http\Response $response)
    {
        $this->_vars = $vars->getVariables();
        $this->_response = $response;
    }

    abstract public function process();
}
