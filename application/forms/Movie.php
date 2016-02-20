<?php

class Application_Form_Movie extends Zend_Form
{
    public function init()
    {
        $this->setName('movie');
        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');
        
        $isEmptyMessage = 'Значение является обязательным и не может быть пустым';
        
        $director = new Zend_Form_Element_Text('director');
        $director->setLabel('Режиссёр')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );
        
        $title = new Zend_Form_Element_Text('title');
        $title->setLabel('Название')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        $this->addElements(array($id, $director, $title, $submit));
    }
}