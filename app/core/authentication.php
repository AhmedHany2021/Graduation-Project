<?php

namespace PROJECT\CORE;

class authentication {
    
    private static $_instance;
    private $session;
    
    private  function __construct(sessionhandler $session)
    {
        $this->session = $session;
    }
    
    private function __clone() {
        
    }
    
    public static function getinstance(sessionhandler $session)
    {
        if(self::$_instance === null) {
            self::$_instance = new self($session);
        }
        return self::$_instance;
    }
    
    public function isauthorized()
    {
        // 1 for denied
        //2 for user
        //3 for doctor
        if(!isset($this->session->auth))
        {
            return 1;
        }
        else
        {
            if($this->session->auth == '')
            {
                return 1;
            }
            else if($this->session->auth == 'u')
            {
                return 2;
            }
            else if($this->session->auth == 'd')
            {
                return 3;
            }
        }
    }
}
