<?php
namespace PROJECT;
use PROJECT\CORE\frontcontroller;
use PROJECT\CORE\sessionhandler;
use PROJECT\CORE\templatehandler;
use PROJECT\CORE\language;
use PROJECT\CORE\registery;
use PROJECT\CORE\statusmessages;
use PROJECT\CORE\authentication;

//main conf and autoloader
require_once '..'.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'conf.php';
require_once PATH.DS.'core'.DS.'autoloader.php';

//check if the request is api 
$url = explode('/', trim($_SERVER['REQUEST_URI'],'/'),3);

if(isset($url[0]) && $url[0] == 'api') //if it is api request
{
    require_once API_PATH.DS.'main.php';
}
else    //if it is normal request
{
    //template
    $template_param = require_once PATH.DS.'templateconf.php';
    $templatehandler = new templatehandler($template_param);

    //language
    $language = new language();

    //session
    $session = new sessionhandler();
    $session->start();

    //authentication 
    $authentication = authentication::getinstance($session);

    //messages session
    $statusmessage = statusmessages::getInstance($session);

    //registery
    $registery = registery::getinstance();
    $registery->_language = $language;
    $registery->_session  = $session;
    $registery->_message = $statusmessage;

    //frontcontroller
    $fronntcontroller = new frontcontroller($templatehandler,$registery,$authentication);
    $fronntcontroller->dispatch();
}