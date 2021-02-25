<?php
namespace PROJECT\CORE;
class autoloader {
    public static function autoload($className)
    {
        $className = str_replace("PROJECT","", $className);
        $className = strtolower($className);
        $className = $className.".php";
        if(file_exists(PATH.$className))
        {
            require_once PATH.$className;
        }
    }
}
spl_autoload_register(__NAMESPACE__.'\autoloader::autoload');