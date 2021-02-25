<?php

namespace PROJECT\CONTROLLERS;

class doctor_patientscontroller extends abstractcontrol{
    
    use \PROJECT\CORE\inputfilter;
    use \PROJECT\CORE\redirector;
    use \PROJECT\CORE\securedata;
    use \PROJECT\CORE\validation;
    
    public function defaultaction()
    {
        $this->_language->load('doctor.common');
        $this->_language->load('doctor.patients_default');
        $doctor = new \PROJECT\MODELS\doctormodel();
        $doctor = $this->_session->user;
        $patient  = new \PROJECT\MODELS\patientmodel();
        $patient->doctor_id = $doctor->id;
        $patient = $patient->_getbydoc();
        $this->_data['user'] = $doctor;
        $this->_data['patients'] = $patient;
        $this->_view();
    }
    
    public function patientaction()
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
                $this->_language->load('doctor.patients_patient');
                $this->_data['user'] = $doctor;
                $this->_data['patient'] = $patient;
                $this->_view();
                
            }
            else 
            {
                $this->redirect('patients');
            }
        }
        else
        {
            $this->redirect('patients');
        }
    }
    
    public function deleteaction()
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
                $patient->doctor_id = null;
                $patient->_update();
                $this->redirect('patients');
            }
            else 
            {
                $this->redirect('patients');
            }
        }
        else
        {
            $this->redirect('patients');
        }
       
    }
    
}
