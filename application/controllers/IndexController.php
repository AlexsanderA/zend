<?php

class IndexController extends Zend_Controller_Action
{
 private $isAjax;
   
    public function init() {
        $this->_helper->AjaxContext()->addActionContext ('add', 'json')->initContext('json');
        $this->_helper->AjaxContext()->addActionContext ('delete', 'json')->initContext('json');
    }
 
   public function addAction(){
     
       $this->_helper->ViewRenderer->setNoRender();
     
 if ($this->_request->isPost()) {
     
       $text=$this->_request->getPost('text');
        $id_polych = $this->_request->getPost('id_polych');
        $id_user = $this->_request->getPost('id_user') ;
    
// Создаём объект модели
     $movies = new Application_Model_DbTable_chat();
         echo $text;
                // Вызываем метод модели addMovie для вставки новой записи
           $movies->addchat($text,$id_polych, $id_user);
                     
        } else {
            echo '$direcftor';
           
        }
        return;
     
    }
    
    
       public function deleteAction()
    {   
         $this->_helper->ViewRenderer->setNoRender();             
        if ($this->_request->isPost()) {
              $id = (int)$this->_request->getPost('id');
                  // Создаём объект модели
                $movies = new Application_Model_DbTable_chat();
                $movies->deletechat($id);
               
        } else {echo "Ошибка";}
          return;        
       }
       
    
    public function indexAction()
    {
      $id = (int)$this->_getParam('id');
      if ($id==''){$id= Zend_Auth::getInstance()->getIdentity()->id;}
     $this->view->title='Мой профиль';
     $this->view->headtitle('Мой профиль');
     $movies = new Application_Model_DbTable_users();
     $this->view->users = $movies->fetchAll(array('id = ?' => $id));
     $mchat = new Application_Model_DbTable_chat();
     $this->view->chat=$mchat->fetchAll(array('id_polych = ?' => $id));
    $this->view->id_polych=(int)$this->_getParam('id');
    }

    
    

}
