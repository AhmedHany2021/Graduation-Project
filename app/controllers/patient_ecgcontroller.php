<?php

namespace PROJECT\CONTROLLERS;

class patient_ecgcontroller extends abstractcontrol{
    
    use \PROJECT\CORE\redirector;
    use \PROJECT\CORE\inputfilter;
    
    public function defaultaction()
    {
        $this->_language->load('patient.common');
        $this->_language->load('patient.ecg_default');
        $patient = new \PROJECT\MODELS\patientmodel();
        $ecg = new \PROJECT\MODELS\ecgmodel();
        $patient = $this->_session->user;
        $ecg->patient_id = $patient->id;
        $this->_data['ecg'] = $ecg->_getall();
        $this->_view();           
    }
    
    public function graphaction()
    {
        $this->_language->load('patient.common');
        $this->_language->load('patient.ecg_graph');
        $patient = new \PROJECT\MODELS\patientmodel();
        $ecg = new \PROJECT\MODELS\ecgmodel();
        $patient = $this->_session->user;
        if(isset($this->_param[0]))
        {
            $this->_param[0] = $this->filter_int($this->_param[0]);
            $ecg->id = $this->_param[0];
            $ecg->patient_id = $patient->id;
            if($ecg = $ecg->_getone())
            {
                $ecg->ecg_read = unserialize($ecg->ecg_read);
                $this->_data['ecg'] = $ecg;
                $this->_view();
            }
            else
            {
                $this->redirect('ecg');
            }
        }
    }
    
    public function deleteaction()
    {
        $patient = new \PROJECT\MODELS\patientmodel();
        $ecg = new \PROJECT\MODELS\ecgmodel();
        $patient = $this->_session->user;
        if(isset($this->_param[0]))
        {
            $this->_param[0] = $this->filter_int($this->_param[0]);
            $ecg->id = $this->_param[0];
            $ecg->patient_id = $patient->id;
            if($ecg->_delete())
            {
                $this->redirect('ecg');
            }
            else
            {
                $this->redirect('ecg');
            }
        }
    }
}
