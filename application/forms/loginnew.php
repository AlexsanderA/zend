<?php

class Application_Form_loginnew extends Zend_Form{
    
    public function init(){
        $author = $this->createElement('text', 'name');
        $author->setLabel('Имя:')
                ->addFilter('StripTags')                // фильтр StripTags убирает HTML теги из введенного текста
                ->addFilter('StringTrim')               // фильтр StringTrim убирает пробелы в начале и в конце текста
                ->setAttrib('placeholder', 'Введите имя')     // устанавливаем примечание
                ->setRequired();                        // делаем поле обязательным
        $this->addElement($author);
 
        $email = $this->createElement('text', 'username');
        $email->setLabel('Email:')
                ->setValidators(array('EmailAddress'))  // валидатор EmailAddress проверяет введенный текст на совпадение с шаблоном youemail@domain.com
                ->setAttrib('placeholder', 'Введите ваш Email')
                ->setRequired();
        $this->addElement($email);
        
        $password = $this->createElement('password', 'password');
        $password->setLabel('Пароль:')
                ->setAttrib('placeholder', 'Введите ваш пароль')
                ->setRequired();
        $this->addElement($password);
 
        $databith = $this->createElement('text', 'data_bith');
        $databith->setLabel('Дата рождения:')
                ->setAttrib('placeholder', 'Введите вашу дату рождения')
                ->setRequired();
        $this->addElement($databith);
		
 /*$decors = array(
            'ViewHelper',
            'Errors',
                array(array('data'=>'HtmlTag'),
                array('tag'=>'div', 'class' => '')),
				
        );*/
		
		
		
	/*
		$this->addElement (new Zend_Form_Element_text('text', array(
         'label' => 'Обновить',
         'class' =>   'dow',
         'decorators'    =>   array('ViewHelper')
     ))
 );
 
 $this->addElement (new Zend_Form_Element_Button('delete', array(
         'label' => 'Удалить',
         'id'    =>   'delete-button',
         'class' =>   'eee',
         'decorators'    =>   array('ViewHelper')
     ))
 );
 
$this->addDisplayGroup(array('text', 'delete'), 'submitButtons', array(
     'decorators' => array(
         'FormElements',
         array('HtmlTag', array('tag' => 'div', 'class' => 'form-buttons')),
     ),
));
		
			*/

$img=$this->createElement('image','img_dowl');
		$img->setLabel('Аватар:')
		->addFilter('StripTags')
				->setAttrib('element-name','images_dowlants')
				->setAttrib('src','/img/upload.png')
				->setAttrib('value','searchGlass')
				->setdecorators(array('ViewHelper', array('label')))
				->setAttrib('id','upload');
		$this->addElement($img);
 
        $img = $this->createElement('text', 'image');
        $img->addFilter('StripTags')
				->setAttrib('placeholder', 'Введите ваш Url ..')
				->setAttrib('class', 'img_dowln')
				->setdecorators(array('ViewHelper', 'Errors'))
                ->setRequired();
        $this->addElement($img);
	
    
	
		
		
  
$this->addDisplayGroup(array('img_dowl', 'image'), 'submitButtons', array(
     'decorators' => array(
         'FormElements',
         array('HtmlTag', array('tag' => 'div', 'class' => 'form-buttons')),
     ),
));
		
		
        $siti = $this->createElement('text', 'citi');
        $siti->setLabel('Город:')
                ->addFilter('StripTags')
                ->setRequired();
        $this->addElement($siti);
 
		
        
        $this->addElement('submit', 'submit', array('label' => 'Сохранить', 'class' => 'btn btn-primary'));
    }
}
?>
