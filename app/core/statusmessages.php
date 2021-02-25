<?php


namespace PROJECT\CORE;

class statusmessages {
    
    private static $_instance;
    private $session;
    private $message = array();
    
    private function __construct(sessionhandler $session)
    {
        $this->session = $session;
    }
    
    private function __clone()
    {
        
    }
    
    public static function getInstance(sessionhandler $session)
    {
        if(self::$_instance === null) {
            self::$_instance = new self($session);
        }
        return self::$_instance;
    }
    
    private function checkexistance()
    {
        return isset($this->session->message);
    }
    
    public function addmessage($msg)
    {
        if(!$this->checkexistance())
        {
            $this->session->message = '';
        }
        $this->message = $msg;
        $this->session->message = $this->message;
    }
    
    public function getmessage()
    {
        if($this->checkexistance())
        {
            $this->message  = $this->session->message;
            unset($this->session->message);
            return $this->message;
        }
        else
        {
            return '';
        }
    }
    
}
