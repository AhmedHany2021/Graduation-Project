<?php

namespace PROJECT\CONTROLLERS;

class doctor_indexcontroller extends abstractcontrol{
    
     public function defaultaction()
    {
        $this->_language->load('doctor.common');
        $this->_language->load('doctor.index_default');
        $this->_view();
    }
}
