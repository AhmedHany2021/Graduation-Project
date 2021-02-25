<?php

namespace PROJECT\CORE;
use PROJECT\CORE\sessionhandler;

class language {
    private $data = array();
    public function load($path)
    {
        if(isset($_SESSION['lang']))
        {
            $lang = sessionhandler::get('lang');
        }
        else
        {
            $lang = DEFAULT_LANGUAGE;
            sessionhandler::set('lang', $lang);
        }
        $lang_path = str_replace('.', DS , $path) . ".lang.php";
        $lang_path = LANGUAGE_PATH . DS . $lang . DS .  $lang_path;
        if(file_exists($lang_path))
        {
            require_once $lang_path;
            if(is_array($_) && !empty($_))
            {
                foreach ($_ as $key => $value) 
                {
                    $this->data[$key] = $value;
                }
            }
        }
        else {
            echo'wrong';
            
        }
    }
    
    public function getdata()
    {
        return $this->data;
    }
    
    public function get($key)
    {
        if(array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }
    }
    
}
