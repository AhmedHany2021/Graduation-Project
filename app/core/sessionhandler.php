<?php

namespace PROJECT\CORE;

class sessionhandler extends \SessionHandler
{  
    use securedata;

    private $session_name = SESSION_NAME;
    private $session_lifetime = SESSION_LIFE_TIME;
    private $session_save_path = SESSION_SAVE_PATH;
    private $session_httponly = HTTP_ONLY;
    private $session_path = "/";
    private $session_ssl;
    private $session_domain;
    private $time_to_live = 30;



    public function __construct()
    {
        $this->session_ssl = isset($_SERVER['HTTPS']) ? true : false;
        $this->session_domain = str_replace('www.', '', $_SERVER['SERVER_NAME']);

        session_name($this->session_name);
        session_save_path($this->session_save_path);
        session_set_cookie_params(
            $this->session_lifetime,
            $this->session_path,
            $this->session_domain,
            $this->session_ssl,
            $this->session_httponly
        );

        ini_set('session.use_cookies', 1);
        ini_set('session.use_only_cookies', 1);
        ini_set('session.use_trans_sid', 0);
        ini_set('session.save_handler', 'files');
        ini_set('session.gc_probability', 1);
    }

    public function __get($key)
    {
        if(isset($_SESSION[$key])) {
            $data = @unserialize($this->decrypt($_SESSION[$key]));
            if($data === false)
            {
                    return $this->decrypt($_SESSION[$key]);
            } 
            else
            {
                return $data;
            }
        } 
        else
        {
            trigger_error('No session key ' . $key . ' exists', E_USER_NOTICE);
        }
    }

    public function __set($key, $value)
    {
        if(is_object($value)) {
            $_SESSION[$key] = $this->encrypt(serialize($value));
        } 
        else if(is_array($value))
        {
            $_SESSION[$key] = $this->encrypt(serialize($value));
        }
        else
        {
            $_SESSION[$key] = $this->encrypt($value);
        }
    }
    
    public function __isset($key)
    {
        return isset($_SESSION[$key]) ? true : false;
    }

    public function __unset($key)
    {
        unset($_SESSION[$key]);
    }
    
    private function renewSession()
    {
        $this->sessionStartTime = time();
        return session_regenerate_id(true);
    }
      
    private function checkSessionValidity()
    {
        if(!isset($this->sessionStartTime)) {
            $this->sessionStartTime = time();
        }       
        else
        {
            if((time() - $this->sessionStartTime) > ($this->time_to_live * 60))
            {
                $this->renewSession();
            }
        }
        return true;
    }
    
    public function start()
    {
        if(session_id() === '')
        {
             if(session_start())
            {
                $this->checkSessionValidity();
            }
        }
    }
    
     public function kill()
    {
        session_unset();

        setcookie(
            $this->session_name,
            '',
            time() - 1000,
            $this->session_path,
            $this->session_domain,
            $this->session_ssl,
            $this->session_httponly
        );

        session_destroy();
    }
      
    public static function get($key)
    {
        if(isset($_SESSION[$key]))
        {
            return openssl_decrypt($_SESSION[$key],CIPHERALGO, CIPHERKEY,true,IV);
        }
    }
    
    public static function set($key,$value)
    {      
            $_SESSION[$key] = openssl_encrypt($value,CIPHERALGO, CIPHERKEY,true,IV);
    }
    
    
}