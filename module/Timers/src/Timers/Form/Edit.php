<?php

namespace Timers\Form;

use \TwitterBootstrapFormDecorators\Form\Form,
    Zend\Form\Element;

class Edit extends Form
{

    public function init()
    {
        $this->setAttrib('class', 'form-horizontal well');
        $this->setName('edit-timer');
        $this->setMethod('post');
        
        $id = new Element\Hidden('timer_id');
        $id->addFilter('Int');
        
        $title = new Element\Text('title');
        $title->setLabel('Title')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        
        $description = new Element\Textarea('description');
        $description->setLabel('Description')
                ->addFilter('StripTags')
                ->addFilter('StringTrim');
        
        $expires = new Element\Text('expires_on');
        $expires->setLabel('Expires')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        
        $recurrent = new Element\Checkbox('recurrent');
        $recurrent->setLabel('Recurrent');
        
        $submit = new Element\Submit('submit');
        $submit->setAttrib('class', 'btn');
        
        $this->addElements(array($id, $title, $description, $expires, $recurrent, $submit));
    }

    public function getData() {
        
    }

}
