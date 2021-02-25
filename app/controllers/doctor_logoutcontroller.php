<?php

namespace PROJECT\CONTROLLERS;


class doctor_logoutcontroller extends abstractcontrol{
    
     use \PROJECT\CORE\redirector;
    use \PROJECT\CORE\redirector;
    
    
    public function defaultaction()
    {
        unset($_SESSION);
        $this->_session->kill();
        $this->redirect('');
    }
    
}
