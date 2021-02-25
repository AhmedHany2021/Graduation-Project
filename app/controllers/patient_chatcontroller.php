<?php

namespace PROJECT\CONTROLLERS;

class patient_chatcontroller extends abstractcontrol{
   
    use \PROJECT\CORE\securedata;
    use \PROJECT\CORE\validation;
    use \PROJECT\CORE\redirector;
    
    public function defaultaction()
    {
        $this->_language->load('patient.common');
        $this->_view();
    }
}
