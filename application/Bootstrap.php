<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAcl()
    {
        // Создаём объект Zend_Acl
        $acl = new Zend_Acl();
        
        // Добавляем ресурсы нашего сайта,
        // другими словами указываем контроллеры и действия
        
         $acl->addResource('mails');
         $acl->addResource('mailsup', 'mails');
         
        
        // указываем, что у нас есть ресурс index
        $acl->addResource('index');
        
        // ресурс add является потомком ресурса index
        $acl->addResource('add', 'index');
        
        // ресурс edit является потомком ресурса index
        $acl->addResource('edit', 'index');
        
        // ресурс delete является потомком ресурса index
        $acl->addResource('delete', 'index');
        
        // указываем, что у нас есть ресурс error
        $acl->addResource('error');
        
        // указываем, что у нас есть ресурс auth
        $acl->addResource('auth');
        
        // ресурс login является потомком ресурса auth
        $acl->addResource('login', 'auth');
        
        // ресурс logout является потомком ресурса auth
        $acl->addResource('logout', 'auth');
        // ресурс login является потомком ресурса auth
        $acl->addResource('loginnew', 'auth');
        
        $acl->addResource('fallload', 'auth');
        
      
        // далее переходим к созданию ролей, которых у нас 2:
        // гость (неавторизированный пользователь)
        $acl->addRole('guest');
        
        // администратор, который наследует доступ от гостя
        $acl->addRole('admin', 'guest');
        
        // разрешаем гостю просматривать ресурс index
        $acl->allow('guest', 'index', array('index'));
        
        // разрешаем гостю просматривать ресурс auth и его подресурсы
        $acl->allow('guest', 'auth', array('index', 'login', 'logout','loginnew','fallload'));
        
        // даём администратору доступ к ресурсам 'add', 'edit' и 'delete'
        $acl->allow('admin', 'index', array('add', 'edit', 'delete'));
        
        // разрешаем администратору просматривать страницу ошибок
        $acl->allow('admin', 'error');
       
        $acl->allow('admin', 'mails');
        
        // получаем экземпляр главного контроллера
        $fc = Zend_Controller_Front::getInstance();
        
        // регистрируем плагин с названием AccessCheck, в который передаём
        // на ACL и экземпляр Zend_Auth
        $fc->registerPlugin(new Application_Plugin_AccessCheck($acl, Zend_Auth::getInstance()));
    }
    
    
     public function _initView(){
     
         $view = new Zend_View();
        
         $view->doctype('HTML5');
        
        $view->headTitle('head')->setDefaultAttachOrder(Zend_View_Helper_Placeholder_Container_Abstract::PREPEND);
        $view->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=UTF-8');
        
       
        $view->headScript()->appendFile('/js/jquery-1.7.1.min.js');
        $view->headScript()->appendFile('/js/jquery.livequery.js');
        $view->headScript()->appendFile('/js/jquery-ui-1.8.17.custom.min.js');
        $view->headScript()->appendFile('/js/bootstrap.min.js');
        $view->headScript()->appendFile('/js/index.js');
        $view->headScript()->appendFile('/js/ajaxupload.3.5.js');
        $view->headScript()->appendFile('/js/jquery-1.3.2.js');
   
        $view->headLink()->appendStylesheet('/css/bootstrap.css');
        
        $view->headLink()->appendStylesheet('/css/index.css');
        $view->addHelperPath (APPLICATION_PATH . '/../library/Cms/View/Helper/', 'Cms_View_Helper_');
        $viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer();
        $viewRenderer->setView($view);
        Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);
        return $view;
    }

    
    
    
}
