<?php

namespace PROJECT\CONTROLLERS;

class patient_heartratecontroller extends abstractcontrol{
    use \PROJECT\CORE\redirector;
    use \PROJECT\CORE\inputfilter;
    
    public function defaultaction()
    {
        $this->_language->load('patient.common');
        $this->_language->load('patient.heartrate_default');
        $patient = new \PROJECT\MODELS\patientmodel();
        $heart_rate = new \PROJECT\MODELS\heart_ratemodel();
        $patient = $this->_session->user;
        $heart_rate->patient_id = $patient->id;
        $this->_data['heart_rate'] = $heart_rate->_getall();
        $this->_view();           
    }
    
    public function deleteaction()
    {
        $patient = new \PROJECT\MODELS\patientmodel();
        $heart_rate = new \PROJECT\MODELS\heart_ratemodel();
        $patient = $this->_session->user;
        if(isset($this->_param[0]))
        {
            $this->_param[0] = $this->filter_int($this->_param[0]);
            $heart_rate->id = $this->_param[0];
            $heart_rate->patient_id = $patient->id;
            if($heart_rate->_delete())
            {
                $this->redirect('heartrate');
            }
            else
            {
                $this->redirect('heartrate');
            }
        }
    }
}
