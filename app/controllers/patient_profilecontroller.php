<?php

namespace PROJECT\CONTROLLERS;
use PROJECT\CORE\fileupload;

class patient_profilecontroller extends abstractcontrol{
    
    use \PROJECT\CORE\inputfilter;
    use \PROJECT\CORE\redirector;
    use \PROJECT\CORE\securedata;
    use \PROJECT\CORE\validation;
    
    
    
    private $profilerole = array(
        'name'      => "req|alpha|min(5)|max(60)",
        'gender'    => "req|alpha|max(1)",
        'weight'    => "req|num|max(3)",
        'height'    => "req|num|max(3)"
    );
    
    private $passwordrole = array(
        'password'      => "req|alphanum|eq_field(password2)",
        'oldpassword'   => "req|alphanum"
    );


    public function defaultaction()
    {
        $this->_language->load('patient.common');
        $this->_language->load('patient.profile_default');
        $patient = new \PROJECT\MODELS\patientmodel();
        $patient = $this->_session->user;
        $this->_data['user'] = $patient;
        $this->_view();
    }
    
    public function editaction()
    {
        $this->_language->load('patient.common');
        $this->_language->load('patient.profile_edit');
        $patient = new \PROJECT\MODELS\patientmodel();
        $patient = $this->_session->user;
        $this->_data['user'] = $patient;
        $this->_view();
    }
    
    public function editimageaction()
    {
        if(isset($_FILES['img']) && $_FILES['img'] != '')
        {
            $file = new fileupload($_FILES['img']);
            try{
                $name = $file->upload()->getFileName();
                $patient = new \PROJECT\MODELS\patientmodel();
                $patient = $this->_session->user;
                $i = $patient->image;
                if(isset($i))
                {
                    unlink(IMAGES_UPLOAD_STORAGE.DS.$patient->image);
                }
                $patient->image = $name;
                $patient->_update();
                $this->_session->user = $patient;
                $this->redirect('profile');
            }
            catch (Exception $ex)
            {
                $this->redirect('profile/edit');
            }
        }
    }
    
    public function editprofileaction()
    {
       if(isset($_POST['submit']))
       {
           if($this->check_array_keys(array_keys($this->profilerole), $_POST) && $this->isValid($this->profilerole, $_POST))
           {
               $patient = new \PROJECT\MODELS\patientmodel();
               $patient = $this->_session->user;
               $patient->user_name = $this->filter_string($_POST['name']);
               $patient->gender = $this->filter_string($_POST['gender']);
               $patient->weight = $this->filter_int($_POST['weight']);
               $patient->height = $this->filter_int($_POST['height']);
               if($patient->_update())
               {
                   $this->_session->user = $patient;
                   $this->redirect('profile');
               }
               else
               {
                   $this->redirect('profile/edit');
               }
           }
       }
    }
    
    public function editpasswordaction()
    {
        if(isset($_POST['submit']))
        {
            if($this->check_array_keys(array_keys($this->passwordrole), $_POST) && $this->isValid($this->passwordrole, $_POST))
            {
                $patient = new \PROJECT\MODELS\patientmodel();
                $patient = $this->_session->user;
                if($patient->password == $this->hash($_POST['oldpassword']))
                {
                    $patient->password = $this->hash($_POST['password']);
                    if($patient->_update())
                    {
                        $this->redirect('profile');
                    }
                }
            }
        }
        $this->redirect('profile/edit');
    }
}
