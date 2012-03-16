<?php

namespace Album\Controller;

use Zend\Mvc\Controller\ActionController,
    Album\Form\AlbumForm,
    Doctrine\ORM\EntityManager;

class AlbumController extends ActionController
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
        return array(
            'albums' => $this->em->getRepository('Album\Entity\Album')->findAll(),
        );
    }

    public function addAction()
    {
        $form = new AlbumForm();
        $form->submit->setLabel('Add');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $formData = $request->post()->toArray();
            if ($form->isValid($formData)) {
                $album = new \Album\Entity\Album;
                $album->artist = $form->getValue('artist');
                $album->title = $form->getValue('title');
                
                $this->em->persist($album);
                $this->em->flush();
                
                return $this->redirect()->toRoute('default', array(
                    'controller' => 'album',
                    'action' => 'index'
                ));
            }
        }
        return array('form' => $form);
    }

    public function editAction()
    {
        $form = new AlbumForm();
        $form->submit->setLabel('Edit');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $formData = $request->post()->toArray();
            
            if ($form->isValid($formData)) {
                $id = $form->getValue('id');
                
                $album = $this->em->find('Album\Entity\Album', $form->getValue('id'));
                if ($album) {
                    $album->artist = $form->getValue('artist');
                    $album->title = $form->getValue('title');
                    $this->em->flush();
                }
                
                return $this->redirect()->toRoute('default', array(
                    'controller' => 'album',
                    'action' => 'index'
                ));
            }
        } else {
            $album = $this->em->find('Album\Entity\Album', $request->query()->get('id'));
            if ($album) {
                $form->populate($album->toArray());
            }
        }
        return array('form' => $form);
    }

    public function deleteAction()
    {
        $request = $this->getRequest();
        $album = $this->em->find('Album\Entity\Album', $request->query()->get('id'));
        
        if ($album) {
            $this->em->remove($album);
            $this->em->flush();
        }
        
        return $this->redirect()->toRoute('default', array(
            'controller' => 'album',
            'action' => 'index'
        ));
    }

}
