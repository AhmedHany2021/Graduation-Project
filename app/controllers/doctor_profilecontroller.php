<?php

namespace PROJECT\CONTROLLERS;
use PROJECT\CORE\fileupload;

class doctor_profilecontroller extends abstractcontrol{
    
    use \PROJECT\CORE\inputfilter;
    use \PROJECT\CORE\redirector;
    use \PROJECT\CORE\securedata;
    use \PROJECT\CORE\validation;
   
    private $profilerole = array(
        'name'              => "req|alpha|min(5)|max(60)",
        'specialization'    => "req|alpha|max(60)",
        'description'       => "req|alpha",
        'country'           => "req|alpha|max(60)",
        'city'              => "req|alpha|max(60)",
        'address'           => "req|alpha",
        'price'             => "req|int",
    );

    private $passwordrole = array(
        'password'      => "req|alphanum|eq_field(password2)",
        'oldpassword'   => "req|alphanum"
    );
    public function defaultaction()
    {
        $this->_language->load('doctor.common');
        $this->_language->load('doctor.profile_default');
        $doctor = new \PROJECT\MODELS\doctormodel();
        $doctor = $this->_session->user;
        $this->_data['user'] = $doctor;
        $this->_view();
    }
    
    public function editaction()
    {
        $this->_language->load('doctor.common');
        $this->_language->load('doctor.profile_default');
        $doctor = new \PROJECT\MODELS\doctormodel();
        $doctor = $this->_session->user;
        $this->_data['user'] = $doctor;
        $this->_view();
    }
    
        public function editimageaction()
    {
        if(isset($_FILES['img']) && $_FILES['img'] != '')
        {
            $file = new fileupload($_FILES['img']);
            try{
                $name = $file->upload()->getFileName();
                $doctor = new \PROJECT\MODELS\doctormodel();
                $doctor = $this->_session->user;
                $i = $doctor->image;
                if(isset($i))
                {
                    unlink(IMAGES_UPLOAD_STORAGE.DS.$doctor->image);
                }
                $doctor->image = $name;
                $doctor->_update();
                $this->_session->user = $doctor;
                $this->redirect('profile');
            }
            catch (Exception $ex)
            {
                $this->redirect('profile/edit');
            }
        }
    }

    public function editpasswordaction()
    {
        if(isset($_POST['submit']))
        {
            if($this->check_array_keys(array_keys($this->passwordrole), $_POST) && $this->isValid($this->passwordrole, $_POST))
            {
                $doctor = new \PROJECT\MODELS\doctormodel();
                $doctor = $this->_session->user;
                if($doctor->password == $this->hash($_POST['oldpassword']))
                {
                    $doctor->password = $this->hash($_POST['password']);
                    if($doctor->_update())
                    {
                        $this->redirect('profile');
                    }
                }
            }
        }
        $this->redirect('profile/edit');
    }
    
        public function editprofileaction()
    {
       if(isset($_POST['submit']))
       {
           if($this->check_array_keys(array_keys($this->profilerole), $_POST) && $this->isValid($this->profilerole, $_POST))
           {
               $doctor = new \PROJECT\MODELS\doctormodel();
               $doctor = $this->_session->user;
               $doctor->user_name = $this->filter_string($_POST['name']);
               $doctor->specialization = $this->filter_string($_POST['specialization']);
               $doctor->description = $this->filter_string($_POST['description']);
               $doctor->country = $this->filter_string($_POST['country']);
               $doctor->city = $this->filter_string($_POST['city']);
               $doctor->address = $this->filter_string($_POST['address']);
               $doctor->price = $this->filter_string($_POST['price']);
               if($doctor->_update())
               {
                   $this->_session->user = $doctor;
                   $this->redirect('profile');
               }
               else
               {
                   $this->redirect('profile/edit');
               }
           }
           else 
           {
               $this->redirect('profile/edit');
           }
       }
       else 
       {
           $this->redirect('profile/edit');
       }
    }

    
}
