<?php

namespace PROJECT\CONTROLLERS;

class authcontroller extends abstractcontrol{
    
    use \PROJECT\CORE\inputfilter;
    use \PROJECT\CORE\redirector;
    use \PROJECT\CORE\securedata;
    use \PROJECT\CORE\validation;
    
    private $patientregisterole = array(
            'name'      => "req|alpha|min(3)|max(60)",
            'phone'     => "req|int|min(10)|max(30)",
            'email'     => "req|email",
            'password'  => "req|alphanum|eq_field(password2)"
        );
    
    private $doctorregisterole = array(
            'name'      => "req|alpha|min(5)|max(60)",
            'phone'     => "req|int|min(11)|max(30)",
            'email'     => "req|email",
            'password'  => "req|alphanum|eq_field(password2)",
            'code'      => "req|int"
        );
    
    private $loginrole = array(
        'email' => "req|email",
        'password'  => "req|alphanum|max(60)"
    );
    
    //add csrf for every form by putting it in the session we 3la alah aftkr
    
    public function defaultaction()
    {
        if(isset($_POST['submit']))
        {
            if(isset($_POST['user-type']))
            {
                if($_POST['user-type'] == 'patient')
                {
                    if(!$this->isValid($this->loginrole, $_POST))
                    {
                    $this->redirect('');
                    }
                    else
                    {
                        $patient = new \PROJECT\MODELS\patientmodel();
                        $patient->email = $this->filter_string($_POST['email']);
                        $patient->password = $this->filter_string($this->hash($_POST['password']));
                        if($patient = $patient->login(1))
                        {
                            $this->_session->auth = 'u';
                            $this->_session->user = $patient;
                            $this->_session->lang = $patient->lang;
                            $this->redirect('');
                        }
                        else
                        {
                            $this->_message->addmessage('wrong');
                            $this->redirect("");
                        }
                    }
                }
                else if ($_POST['user-type'] == 'doctor')
                {
                    if(!$this->isValid($this->loginrole, $_POST))
                    {
                    $this->redirect('');
                    }
                    else
                    {
                        $doctor = new \PROJECT\MODELS\doctormodel();
                        $doctor->email = $this->filter_string($_POST['email']);
                        $doctor->password = $this->filter_string($this->hash($_POST['password']));
                        if($doctor = $doctor->login(1))
                        {
                            $this->_session->auth = 'd';
                            $this->_session->user = $doctor;
                            $this->_session->lang = $doctor->lang;
                            $this->redirect('');
                        }
                        else
                        {
                            $this->_message->addmessage('wrong');
                            $this->redirect("");
                        }
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
            $this->_language->load('auth.login');
            $this->_view();
        }    
    }
    
    public function forgotpasswordaction()
    {
        $this->_language->load('auth.forgotpassword');
        $this->_view();
    }
    
    public function patientregisteraction()
    {
        if(isset($_POST['submit']))
        {
            if(!$this->isValid($this->patientregisterole, $_POST))
            {
                $this->redirect('auth/patientregister');
            }
            else
            {
                $patient = new \PROJECT\MODELS\patientmodel();
                $patient->user_name = $this->filter_string($_POST['name']);
                $patient->email = $this->filter_string($_POST['email']);
                $patient->phone = $this->filter_int($_POST['phone']);
                $patient->password = $this->hash($_POST['password']);
                if($patient = $patient->signup())
                {
                    $this->redirect('');
                }
                else
                {
                    $this->redirect('auth/patientregister');
                }
            }
        }
        else
        {
            $this->_language->load('auth.patientregister');
            $this->_view();
        }
    }
    
    public function doctorregisteraction()
    {
        if(isset($_POST['submit']))
        {
            if(!$this->isValid($this->patientregisterole, $_POST))
            {
                $this->redirect('auth/patientregister');
            }
            else
            {
                $code = new \PROJECT\MODELS\doctor_register_codemodel();
                $code->code = $this->filter_int($_POST['code']);
                if($code->_iscodevalid())
                {
                    $doctor = new \PROJECT\MODELS\doctormodel();
                    $doctor->user_name = $this->filter_string($_POST['name']);
                    $doctor->email = $this->filter_string($_POST['email']);
                    $doctor->phone = $this->filter_int($_POST['phone']);
                    $doctor->password = $this->hash($_POST['password']);
                    if($doctor = $doctor->signup())
                    {
                        $this->redirect('');
                    }
                    else
                    {
                        $this->redirect('auth/patientregister');
                    }
                }
                else
                {
                    $this->redirect('auth/patientregister');
                }
            }
        }
        else
        {
            $this->_language->load('auth.patientregister');
            $this->_view();
        }
    }
    
    public function notfoundaction() {
        $this->redirect('');
    }
    
}
