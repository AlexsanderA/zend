<?php

class AuthController extends Zend_Controller_Action
{

    public function init()
    {         
        $this->isAjax = $this->_request->isXmlHttpRequest();
        if ($this->isAjax)
            // если это аякс запрос то отключаем layout
            $this->_helper->layout()->disableLayout();
  
    }

    public function indexAction()
    {
       $this->_helper->redirector('login');
        
    }

    public function loginAction()
    {
        
        $form = new Application_Form_Login();
        if ($this->isAjax)
            // если аякс отключаем скрипт вида
            // таким образом мы будем использовать один action для
            // аякс запросов и для прямого обращения к этому экшену
            $this->_helper->ViewRenderer->setNoRender();
        // если это POST запрос
        // 
        // проверяем, авторизирован ли пользователь
        if (Zend_Auth::getInstance()->hasIdentity()) {
            // если да, то делаем редирект, чтобы исключить многократную авторизацию
            $this->_helper->redirector('index', 'index');
        }
        
        // создаём форму и передаём её во view
        //$form = new Application_Form_Login();
       // $this->view->form = $form;
        
        // Если к нам идёт Post запрос
        if ($this->getRequest()->isPost()) {
            // Принимаем его
            $formData = $this->getRequest()->getPost();
            
            // Если форма заполнена верно
            if ($form->isValid($formData)) {
                // Получаем адаптор подключения к базе данных
                $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
                
                // указываем таблицу, где необходимо искать данные о пользователях
                // кололку, где искать имена пользователей,
                // а так же колонку, где хранятся пароли
                $authAdapter->setTableName('users')
                    ->setIdentityColumn('username')
                    ->setCredentialColumn('password');
                
                // получаем введённые данные
                $username = $this->getRequest()->getPost('username');
                $password = $this->getRequest()->getPost('password');
                
                // подставляем полученные данные из формы
                $authAdapter->setIdentity($username)
                    ->setCredential($password);
                
                // получаем экземпляр Zend_Auth
                $auth = Zend_Auth::getInstance();
                
                // делаем попытку авторизировать пользователя
                $result = $auth->authenticate($authAdapter);
                
                // если авторизация прошла успешно
                if ($result->isValid()) {
                    // используем адаптор для извлечения оставшихся данных о пользователе
                    $identity = $authAdapter->getResultRowObject();
                    
                    // получаем доступ к хранилищу данных Zend
                    $authStorage = $auth->getStorage();
                    
                    // помещаем туда информацию о пользователе,
                    // чтобы иметь к ним доступ при конфигурировании ACL
                    $authStorage->write($identity);
                    
                    // Используем библиотечный helper для редиректа
                    // на controller = index, action = index
                    $this->_helper->redirector('index', 'index');
                } else {
                    $this->view->errMessage = 'Вы ввели неверное имя пользователя или неверный пароль';
                }
            }
                
     
                }else{
                // если аякс запрос возвращаем строку
                // {"status": "fail", "message": "Fields cannot be empty"}
                if ($this->isAjax)
                    return $this->_helper->json(array('status' => 'fail', 'message' => 'Fields cannot be empty'));
            }
        $this->view->form = $form;
        
    }

    public function logoutAction()
    {
        // уничтожаем информацию об авторизации пользователя
        Zend_Auth::getInstance()->clearIdentity();
        
        // и отправляем его на главную
        $this->_helper->redirector('index', 'index');
         $this->_helper->ViewRenderer->setNoRender();
        // запрещаем использовать layout
        $this->_helper->layout()->disableLayout();
        // получаем экземпляр класса Zend_Auth
        $auth = Zend_Auth::getInstance();
        // елси кто-то залогинен разлогиниваем
        if ($auth->hasIdentity())
            $auth->clearIdentity ();
        // делаем редирект на главную страницу
        $this->_redirect($this->view->baseUrl());
    }
    
    public function loginnewAction()
            {
        // создаем форму
        $text=$this->_request->getPost('<a>Благодарим Вас за регистрацию на сайте!</a><br> Мы будем очень благодарны Вам за помощь в работе над нашим сайтом!');
        $title = $this->_request->getPost('регистрация') ;
    
         
       $form = new Application_Form_loginnew();
       
               // проверяем это POST запрос или нет
        if ($this->_request->isPost()){
            // проверяем валидны ли данные в форме
            if ($form->isValid($this->_request->getParams())){
                $name=$this->getRequest()->getPost('name');
                $username=$this->getRequest()->getPost('username');
                $image=$this->getRequest()->getPost('image');
                $citi=$this->getRequest()->getPost('citi');
                $password=$this->getRequest()->getPost('password');
                $data_bith=$this->getRequest()->getPost('data_bith');
                               
                // вызываем метод который вставляет запись в БД
                           
                 $authnew= new Application_Model_DbTable_users();
                 $authnew->insertaut($name,$username,$image,$citi,$password,$data_bith);
                 
                 
                 $movies = new Application_Model_DbTable_mails();
                 $select  = $movies->select()->where('username = ?', $username);
                 $rows = $movies->fetchAll($select);
                 echo $rows->id;
//                 $this->view->users=$movies->fetchAll(array('username = ?' => $username));
//                 $id_user=$this->_getParam('id');
//                  echo $id_user;
//                  $movies = new Application_Model_DbTable_mails();
                // Вызываем метод модели addmails для вставки новой записи
                //$movies->addmails('$text','1', '$title', '2', '1');
                 
                 $this->_helper->layout()->message = 'Спасибо за регистрацию ' . $this->_request->getParam('type') .'!';
                // а так же класс сообщения (в данном случае sucess)
                $this->_helper->layout()->message_class = 'alert-success';
                // делаем форвард на главную страницу
                //return $this->_forward('login','index');
            }else{
                $this->view->form = $form;
            }
        }
        $this->view->form = $form;
    }
    
         
    
    public function fallloadAction()
    {
       
    }
   
}