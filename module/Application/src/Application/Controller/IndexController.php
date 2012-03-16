<?php

namespace Application\Controller;

use Zend\Mvc\Controller\ActionController,
    Doctrine\ORM\EntityManager;

class IndexController extends ActionController
{

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;
    
    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function indexAction()
    {    
        return array (
            'timers' => $this->em->getRepository('Timers\Entity\Timers')->findAll()
        );
    }
}
