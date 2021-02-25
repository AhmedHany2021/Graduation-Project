<?php

namespace PROJECT\CONTROLLERS;

class doctor_langcontroller extends abstractcontrol{
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
        $doctor = new \PROJECT\MODELS\doctormodel();
        $doctor = $this->_session->user;
        $doctor->lang = $this->_session->lang;
        $doctor->_update();
        $url =  parse_url($_SERVER['HTTP_REFERER'],PHP_URL_PATH);
        echo $url = trim($url,'/');
        $this->redirect($url);
    }
}
