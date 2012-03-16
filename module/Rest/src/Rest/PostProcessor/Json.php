<?php

namespace Rest\PostProcessor;

class Json extends AbstractPostProcessor
{

    public function process()
    {
        $result = \Zend\Json\Encoder::encode($this->_vars);

        $this->_response->setContent($result);

        $headers = $this->_response->headers();
        //$headers->addHeaderLine('Content-Type', 'application/json');
        //$this->_response->setHeaders($headers);
    }

}

