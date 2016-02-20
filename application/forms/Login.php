<?php

class Application_Form_Login extends Zend_Form
{
    public function init()
    {
                  // указываем декораторы
        $decors = array(
            'ViewHelper',   // декоратор элемента урпавления
            'Errors',       // декоратор для возможных ошибок
                // элемент input будет окружен в теги <li>
                array(array('data'=>'HtmlTag'),array('tag'=>'li', 'class' => 'element')),
                // указываем что для полей ввода будут использоваться так же поля label
                array('label'),
                // элемент label будет окружен в теги <li>    
                array(array('row'=>'HtmlTag'),array('tag'=>'li', 'class' => 'element-label'))
        );
        // указываем атрибут для формы
        $this->setAttrib('class', 'login well');
        // создем поля
        $username = $this->createElement('text', 'username');
        $username->setLabel('Email:')
                ->setRequired()
                ->addFilter('StripTags')
                ->setAttrib('placeholder', 'Enter your email')
                ->setDecorators($decors);
        $this->addElement($username);
 
        $password = $this->createElement('password', 'password');
        $password->setLabel('Password:')
                ->setRequired()
                ->setAttrib('placeholder', 'Enter your password')
                ->setDecorators($decors);
        $this->addElement($password);

               
        $decors = array(
            'ViewHelper',
            'Errors',
                array(array('data'=>'HtmlTag'),
                array('tag'=>'li', 'class' => 'form-actions no-ajax clear submit')),
				
        );
 
        $submit = $this->addElement('button', 'login', array(
            'label' => 'Войти',
            'class' => 'btn btn-primary',
            'type' => 'submit',
            'decorators' => $decors));
		          
 
        $this->addDecorators(array(
                        'FormElements',
                        array(array('data'=>'HtmlTag', 'tag'=>'ul'),
                        array('tag'=>'ul','class'=>'login-form')),
                               ));
 
        $this->addDecorators(array('tag'=>'form'));
        

    }
}