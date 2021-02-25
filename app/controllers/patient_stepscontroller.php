<?php

namespace PROJECT\CONTROLLERS;

class patient_stepscontroller extends abstractcontrol{
    
    public function defaultaction()
    {
        $this->_language->load('patient.common');
        $this->_language->load('patient.steps_default');
        $steps = new \PROJECT\MODELS\stepsmodel();
        $patient = new \PROJECT\MODELS\patientmodel();
        $patient = $this->_session->user;
        $steps->patient_id = $patient->id;
        $steps = $steps->_getall();
        $this->_data['steps']  = $steps;
        $this->_view();      
    }
    
}
