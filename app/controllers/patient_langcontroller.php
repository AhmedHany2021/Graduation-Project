<?php

namespace PROJECT\CONTROLLERS;

class patient_langcontroller extends abstractcontrol{
    use \PROJECT\CORE\redirector;
    
    public function defaultaction()
    {
        if(isset($this->_session->lang))
        {
            $lang = $this->_session->lang;
            if($lang === 'ar')
            {
                $this->_session->lang = 'en';
            }
            else if ($lang === 'en')
            {
                $this->_session->lang = 'ar';
            }
        }
        $patient = new \PROJECT\MODELS\patientmodel();
        $patient = $this->_session->user;
        $patient->lang = $this->_session->lang;
        $patient->_update();
        $url =  parse_url($_SERVER['HTTP_REFERER'],PHP_URL_PATH);
        echo $url = trim($url,'/');
        $this->redirect($url);
    }
}
