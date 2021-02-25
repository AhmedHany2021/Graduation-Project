<?php

namespace PROJECT\CONTROLLERS;

class abstractcontrol {
    protected $_controller = 'index';
    protected $_action = 'default';
    protected $_param = array();
    protected $_templatehandler;
    protected $_registery;
    protected $_state;

    protected $_data = [];

    public function __get($key)
    {
        return $this->_registery->$key;
    }


    public function setcontroller($controller)
    {
        $this->_controller = $controller;
    }
    
    public function setaction($action) {
        $this->_action = $action;
    }
    
    public function setparam(array $param) {
        $this->_param = $param;
    }
    
    public function setstate($state)
    {
        $this->_state = $state;
    }

    public function settemplatehandler($templatehandler)
    {
        $this->_templatehandler = $templatehandler;
    }
    
    public function setregistery($registery) {
        $this->_registery = $registery;
    }


    public function notfoundaction() {
        header("location: \\");
    }
    
    protected function _view()
    {
        if($this->_state == 1)
        {
            $path = VIEWS_PATH. 'auth' . DS;
        }
        else if($this->_state == 2)
        {
            $this->_data['user1'] = $this->_session->user;
            $path = VIEWS_PATH. 'patient' . DS;
        }
        else if($this->_state == 3)
        {
            $this->_data['user1'] = $this->_session->user;
            $path = VIEWS_PATH. 'doctor' . DS;
        }
        if ($this->_action == NOT_FOUND_ACTION) {
            $view = $path ."notfound". DS . 'notfound.view.php';
        }
        else {
           $view = $path . $this->_controller . DS . $this->_action . '.view.php';
        }
        if(!file_exists($view))
        {
            $view = $path ."notfound". DS . 'noview.view.php';
        }
        $lang_data = $this->_language->getdata();
        $this->_data = array_merge($lang_data , $this->_data);
        $this->_templatehandler->setactionpath($view);
        $this->_templatehandler->setdata($this->_data);
        $this->_templatehandler->setregistery($this->_registery);
        $this->_templatehandler->render();
    }
}