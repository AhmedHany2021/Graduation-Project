<?php

namespace PROJECT\CONTROLLERS;

class doctor_heartratecontroller extends abstractcontrol{
    
    use \PROJECT\CORE\inputfilter;
    use \PROJECT\CORE\redirector;
    use \PROJECT\CORE\securedata;
    use \PROJECT\CORE\validation;

        public function defaultaction()
    {
        if(isset($this->_param[0]))
        {

            $doctor = new \PROJECT\MODELS\doctormodel();
            $doctor = $this->_session->user;
            $patient  = new \PROJECT\MODELS\patientmodel();
            $patient->doctor_id = $doctor->id;
            $patient->id = $this->_param[0];
            if($patient = $patient->_getonebydoc())
            {
                $this->_language->load('doctor.common');
                $this->_language->load('doctor.heartrate_default');
                $heart_rate = new \PROJECT\MODELS\heart_ratemodel();
                $heart_rate->patient_id = $patient->id;
                $this->_data['heartrate'] = $heart_rate->_getall();
                $this->_data['patient']  = $patient;
                $this->_view();
            }
            else 
            {
                $this->redirect('');
            }
         }
        else
        {
            $this->redirect('patients');
        }
    }

    
}
