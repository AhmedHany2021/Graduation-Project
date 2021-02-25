<?php

namespace PROJECT\MODELS;

class doctor_register_codemodel extends abstractmodel {
  private $id =   '';

  private $code =   '';

  private static $tablename =   'doctor_register_code';

  private static $pk =   array('id'  => self::PARAM_INT);

  private static $tableschema =   array(
        'code'      => self::PARAM_STR
    );

  public function __set($key, $value)
  {

        $this->$key = $value;
  }

  public function __get($key)
  {

        return $this->$key;
  }

  public function _iscodevalid()
  {

        return $this->getby(self::$tablename, self::$tableschema, array_key_first(self::$pk), self::$tableschema, '');
  }

}

