<?php

namespace PROJECT\CONTROLLERS;

class doctor_ecgcontroller extends abstractcontrol{
    
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
                $this->_language->load('doctor.ecg_default');
                $ecg = new \PROJECT\MODELS\ecgmodel();
                $ecg->patient_id = $patient->id;
                $this->_data['ecg'] = $ecg->_getall();
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
    
    public function graphaction()
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
                $this->_language->load('doctor.ecg_graph');
                $ecg = new \PROJECT\MODELS\ecgmodel();
                if(isset($this->_param[1]))
                {
                    $this->_param[1] = $this->filter_int($this->_param[1]);
                    $ecg->id = $this->_param[1];
                    $ecg->patient_id = $patient->id;
                    if($ecg = $ecg->_getone())
                    {
                        $ecg->ecg_read = unserialize($ecg->ecg_read);
                        $this->_data['patient'] = $patient;
                        $this->_data['ecg'] = $ecg;
                        $this->_view();
                    }
                    else
                    {
                        $this->redirect('');
                    }
                }
                else 
                {
                    $this->redirect('');
                }
            }
        }
        else
        {
            $this->redirect('patients');
        }
    }
    
    public function commentaction ()
    {
        if(isset($_POST['submit']))
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
                    $ecg = new \PROJECT\MODELS\ecgmodel();
                    if(isset($this->_param[1]))
                    {
                        $this->_param[1] = $this->filter_int($this->_param[1]);
                        $ecg->id = $this->_param[1];
                        $ecg->patient_id = $patient->id;
                        if($ecg = $ecg->_getone())
                        {
                            $ecg->comment = $this->filter_string($_POST['comment']);
                            $ecg->_update();
                            $url =  parse_url($_SERVER['HTTP_REFERER'],PHP_URL_PATH);
                            echo $url = trim($url,'/');
                            $this->redirect($url);

                        }
                        else
                        {
                            $this->redirect('');
                        }
                    }
                    else 
                    {
                        $this->redirect('');
                    }
                }
            }
            else
            {
                $this->redirect('patients');
            }

        }
        else
        {
            $this->redirect('');
        }
    }
            
}
