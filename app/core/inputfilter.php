<?php
namespace PROJECT\CORE;

trait inputfilter {
    
    public function filter_int($value)
    {
        return filter_var($value, FILTER_SANITIZE_NUMBER_INT);
    }
    
    public function filter_float($value)
    {
        return filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    }
    
    public function filter_string($value)
    {
        $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
        $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");
        $val = str_replace($search, $replace, $value);
        return htmlentities(strip_tags($val),ENT_QUOTES,"utf-8");
    }
}
