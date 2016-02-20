<?php
class mailsController extends Zend_Controller_Action
{
private $isAjax;
   
    public function init() {
        $this->_helper->AjaxContext()->addActionContext ('ajax', 'json')->initContext('json');
        $this->_helper->AjaxContext()->addActionContext ('update', 'json')->initContext('json');
        $this->_helper->AjaxContext()->addActionContext ('delete', 'json')->initContext('json');
        $this->_helper->AjaxContext()->addActionContext ('mailup', 'json')->initContext('json');
        $this->_helper->AjaxContext()->addActionContext ('mailnew', 'json')->initContext('json');
    }
 
    public function ajaxAction(){
        $this->_helper->ViewRenderer->setNoRender();
      
     if ($this->_request->isPost()) {
         $text=$this->_request->getPost('text');
         $statys = $this->_request->getPost('statys');
         $title = $this->_request->getPost('title') ;
         $poluchatel=$this->_request->getPost('poluchatel') ;
         $otpravitel=$this->_request->getPost('otpravitel') ;
         
               
                // Создаём объект модели
                $movies = new Application_Model_DbTable_mails();
                
                // Вызываем метод модели addMovie для вставки новой записи
                $movies->addmails($text,$statys, $title, $poluchatel, $otpravitel);
//                 Вызываем метод модели addMovie для вставки новой записи
              
//                
        } else {
            echo '$director';
           
        }
        return;
     
    }

    

    public function frendsAction()
    {
     $this->view->title='Мой друзья';
     $this->view->headtitle('Мой друзья');
     $movies = new Application_Model_DbTable_users();
     $this->view->users = $movies->fetchAll();
     
    }

    
    public function mailupAction()
    {
     
     $this->view->title='Мой письма';
     $this->view->headtitle('Мой письма');
     $movie = new Application_Model_DbTable_mails();
     $this->view->mails = $movie->fetchAll();
     $form=new Application_Form_mails();
     $this->view->form= $form;
    }
    
    public function maildownAction()
    {
     
     $this->view->title='Мой отправленные письма';
     $this->view->headtitle('Мой письма');
     $movie = new Application_Model_DbTable_mails();
     $this->view->mails = $movie->fetchAll();
     $form=new Application_Form_mails();
     $this->view->form= $form;
    }
    

    public function updateAction()
    {
            
        $this->_helper->ViewRenderer->setNoRender();
       
     if ($this->_request->isPost()) {
               $id = (int)$this->_request->getPost('id');
                  // Создаём объект модели
                $movies = new Application_Model_DbTable_mails();
                 // Вызываем метод модели addMovie для вставки новой записи
                $movies->updatemails($id );
              
        } else {
            echo 'Ошибка';}
       }

    public function deleteAction()
    {   
        $this->_helper->ViewRenderer->setNoRender();
             
        if ($this->_request->isPost()) {
              $id = (int)$this->_request->getPost('id');
                  // Создаём объект модели
                $movies = new Application_Model_DbTable_mails();
                $movies->deletemails($id);
               
        } 
           
     
                
       }
        
       
       
       public function mailnewAction()
    {    
           $this->_helper->ViewRenderer->setNoRender();
           
           if ($this->_request->isPost()) { 
           $id=(int)$this->_getParam('id');
           $mchat = new Application_Model_DbTable_mails();
           $row=$mchat->fetchAll(array('polychatel = ?' => $id, 'statys = 1'));
           $rowCount =count($row);
           if ($rowCount>0) {echo $rowCount;} else {echo '';}
          
           }
     
       }
       
       
    }

   
    
    
?>

