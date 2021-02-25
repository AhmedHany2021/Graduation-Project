<?php

namespace PROJECT\CONTROLLERS;

class patient_logoutcontroller extends abstractcontrol{
    
    use \PROJECT\CORE\redirector;
    use \PROJECT\CORE\redirector;
    
    
    public function defaultaction()
    {
        unset($_SESSION);
        $this->_session->kill();
        $this->redirect('');
    }
}
