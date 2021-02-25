<?php 
namespace PROJECT\CORE;

//define("NOT_FOUND_CONTROLLER",'PROJECT\CONTROLLERS\notfoundcontroller');
define("NOT_FOUND_CONTROLLER_PATIENT",'PROJECT\CONTROLLERS\patient_notfoundcontroller');
define("NOT_FOUND_CONTROLLER_DOCTOR",'PROJECT\CONTROLLERS\doctor_notfoundcontroller');
define("NOT_FOUND_ACTION","notfoundaction");
define("AUTH_CONTROLLER" , "PROJECT\CONTROLLERS\authcontroller");
 
class frontcontroller {
    private $_controller = 'index';
    private $_action = 'default';
    private $_param = array();
    private $_templatehandler;
    private $_registery;
    private $_authentication;
    private $_state;
    
    public function __construct(templatehandler $templatehandler, registery $registery , authentication $authentication)
    {
        $this->_registery = $registery;
        $this->_templatehandler = $templatehandler;
        $this->_authentication = $authentication;
        $this->_ParseUrl();
    }

    private function _ParseUrl() {
        $url = explode('/', trim($_SERVER['REQUEST_URI'],'/'),3);
        if(isset($url[0])&&$url[0] != '')
        {
            $this->_controller = $url[0];
            if(isset($url[1])&&$url[1] != '')
            {
                $this->_action = $url[1];
                if(isset($url[2])&&$url[2] != '')
                {
                    $this->_param = explode('/',$url[2]);
                }
            }
        }
    }
    
    public function dispatch() {
        $state = $this->_authentication->isauthorized();
        $this->_state = $state;
        if($state == 1)
        {
            $this->_templatehandler->swaptemplate('auth');
            $control_class = AUTH_CONTROLLER;
            $this->_controller = 'auth';
        }
        else if($state == 2)
        {         
            $this->_templatehandler->swaptemplate('patient');
            $control_class = 'PROJECT\CONTROLLERS\patient_'.$this->_controller."controller";
            if(!class_exists($control_class))
            {
                $control_class = NOT_FOUND_CONTROLLER_PATIENT;
            }
        }
        else if($state == 3)
        {
            $this->_templatehandler->swaptemplate('doctor');
            $control_class = 'PROJECT\CONTROLLERS\doctor_'.$this->_controller."controller";
            if(!class_exists($control_class))
            {
                $control_class = NOT_FOUND_CONTROLLER_DOCTOR;
            }
        }
        $control_action = $this->_action."action";
        $controller = new $control_class();
        if(!method_exists($controller, $control_action))
        {
            $this->_action = $control_action = NOT_FOUND_ACTION;
        }
       $controller->setcontroller($this->_controller);
       $controller->setaction($this->_action);
       $controller->setparam($this->_param);
       $controller->settemplatehandler($this->_templatehandler);
       $controller->setregistery($this->_registery);
       $controller->setstate($this->_state);
       $controller->$control_action();
    }
}
