<?php


namespace PROJECT\CONTROLLERS;


class patient_indexcontroller extends abstractcontrol{
    
    public function defaultaction()
    {
        $this->_language->load('patient.common');
        $this->_language->load('patient.index_default');
        $this->_view();
    }
}
