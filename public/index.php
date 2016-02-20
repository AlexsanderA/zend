<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once '../library/zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

$application->bootstrap();

$router = Zend_Controller_Front::getInstance()->getRouter();
$router->addRoute(
        'mails-ajax',
        new Zend_Controller_Router_Route(
                '/ajax',
                array(
                    'controller' => 'mails',
                    'action' => 'ajax'
                )
        )
);
$router->addRoute(
        'mails-update',
        new Zend_Controller_Router_Route(
                '/update',
                array(
                    'controller' => 'mails',
                    'action' => 'update'
                )
        )
);
$router->addRoute(
        'mails-delet',
        new Zend_Controller_Router_Route(
                '/delet',
                array(
                    'controller' => 'mails',
                    'action' => 'delete'
                )
        )
);
$router->addRoute(
        'mails-mailup',
        new Zend_Controller_Router_Route(
                '/mailup',
                array(
                    'controller' => 'mails',
                    'action' => 'mailup'
                )
        )
);
$router->addRoute(
        'index-index',
        new Zend_Controller_Router_Route(
                '/index',
                array(
                    'controller' => 'index',
                    'action' => 'index'
                )
        )
);
$router->addRoute(
        'index-add',
        new Zend_Controller_Router_Route(
                '/add',
                array(
                    'controller' => 'index',
                    'action' => 'add'
                )
        )
);
$router->addRoute(
        'index-delete',
        new Zend_Controller_Router_Route(
                '/delete',
                array(
                    'controller' => 'index',
                    'action' => 'delete'
                )
        )
);

$router->addRoute(
        'auth-loginnew',
        new Zend_Controller_Router_Route(
                '/loginnew/',
                array(
                    'controller' => 'Auth',
                    'action' => 'loginnew'
                )
        )
);
$router->addRoute(
        'mails-mailnew',
        new Zend_Controller_Router_Route(
                '/mailnew',
                array(
                    'controller' => 'mails',
                    'action' => 'mailnew'
                )
        )
);
$router->addRoute(
        'auth-fallload',
        new Zend_Controller_Router_Route(
                '/fallload',
                array(
                    'controller' => 'auth',
                    'action' => 'fallload'
                )
        )
);

$router->addRoute(
        'auth-newuser',
        new Zend_Controller_Router_Route(
                '/newuser',
                array(
                    'controller' => 'auth',
                    'action' => 'newuser'
                )
        )
);
$application->run();