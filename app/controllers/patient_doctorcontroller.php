<?php

namespace PROJECT\CONTROLLERS;

class patient_doctorcontroller extends abstractcontrol {
  use \PROJECT\CORE\inputfilter;
  use \PROJECT\CORE\redirector;
  use \PROJECT\CORE\securedata;
  use \PROJECT\CORE\validation;
  public function defaultaction()
  {

        $this->_language->load('patient.common');
        $this->_language->load('patient.doctor_default');
        $patient = new \PROJECT\MODELS\patientmodel();
        $doctor = new \PROJECT\MODELS\doctormodel();
        $patient = $this->_session->user;
        if($doctor_id = $patient->doctor_id)
        {
            $doctor->id = $doctor_id;
            $doctor = $doctor->_getbypk();
            $this->_data['doctor'] = $doctor;
            $this->_data['user'] = $patient;
        }
        else
        {
            $doctor = $doctor->_getall();
            $this->_data['doctors'] = $doctor;
        }
        $this->_view();              
  }

  public function deleteaction()
  {

        $patient = new \PROJECT\MODELS\patientmodel();
        $patient = $this->_session->user;
        $patient->doctor_id = null;
        $patient->_update();
        $patient = $patient->_getbypk();
        $this->_session->user = $patient;
        $this->redirect('doctor');
  }

  public function joinaction()
  {

        if(isset($this->_param[0]))
        {
            $patient = new \PROJECT\MODELS\patientmodel();
            $patient = $this->_session->user;
            $patient->doctor_id = $this->filter_int($this->_param[0]);
            if($patient->_update())
            {
                $patient = $patient->_getbypk();
                $this->_session->user = $patient;
                $this->redirect('doctor');
            }
            else
            {
                $this->redirect('');
            }
        }

  }

  public function oneaction()
  {

        if(isset($this->_param[0]))
        {
            $doctor = new \PROJECT\MODELS\doctormodel();
            $doctor->id = $this->filter_int($this->_param[0]);
            if($doctor = $doctor->_getbypk())
            {
                $this->_data['doctor'] = $doctor;
                $this->_data['title'] = 'docotr '.$doctor->user_name;
                $this->_language->load('patient.common');
                $this->_view();
            }
            else
            {
                $this->redirect('');
            }
        }
        else
        {
            $this->redirect('doctor');
        }

  }

}

