<?php

namespace Timers\Controller;

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
        
    }
    
    public function editAction()
    {
        $form = new \Timers\Form\Edit;
        $request = $this->getRequest();
        $id = $request->query()->get('id', null);
        
        if ($id) {
            /*
             * prefill form if id is supplied
             */
            $timer = $this->em->getRepository('Timers\Entity\Timers')->find($request->query()->get('id', 0));
            if ($timer) {
                $form->populate($timer->toArray());
            }
            $form->submit->setLabel('Edit');
        } else {
            $form->submit->setLabel('Add');
        }
        
        if ($request->isPost() && $form->isValid($request->post()->toArray())) {
            $timer = $this->em->getRepository('Timers\Entity\Timers')->find($form->getValue('timer_id'));
            
            if (!$timer) {
                $timer = new \Timers\Entity\Timers;
            }
            
            $timer->title = $form->getValue('title');
            $timer->description = $form->getValue('description');
            $timer->expires_on = $form->getValue('expires_on');
            $timer->recurrent = $form->getValue('recurrent', 0);

            $this->em->persist($timer);
            $this->em->flush();
            
            return $this->redirect()->toUrl('/');
        } else {
            
        }
        
        return array('form' => $form);
    }
    
    public function deleteAction()
    {
        $id = $this->getRequest()->query()->get('id', 0);
        $timer = $this->em->find('Timers\Entity\Timers', $id);
        if ($timer) {
            $this->em->remove($timer);
            $this->em->flush();
        }
        
        $this->redirect()->toUrl('/');
    }
}
