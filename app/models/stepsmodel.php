<?php

namespace PROJECT\MODELS;

class stepsmodel extends abstractmodel {
  private $id;

  private $steps;

  private $target;

  private $create_time;

  private $last_update;

  private $patient_id;

  private static $tablename =   'steps';

  private static $pk =   array('id' => self::PARAM_INT);

  private static $tableschema =   array(
        'steps'         => self::PARAM_STR,
        'target'        => self::PARAM_STR,
        'create_time'   => self::PARAM_STR,
        'last_update'   => self::PARAM_STR,
        'patient_id'    => self::PARAM_INT
    );

  private static $createschema =   array(
        'steps'         => self::PARAM_STR,
        'target'        => self::PARAM_STR,
        'patient_id'    => self::PARAM_INT
    );

  public function __construct()
  {

        
  }

  public function __set($name, $value)
  {

        $this->$name = $value;
  }

  public function __get($name)
  {

        return $this->$name;
  }

  public function _create()
  {

        return $this->create(self::$tablename, self::$createschema);
  }

  public function _getall()
  {

        return $this->getallby(self::$tablename, self::$tableschema, array_key_first(self::$pk),array('patient_id' => self::PARAM_INT),'');
  }

  public function _delete()
  {

        return $this->delete(self::$tablename,array(
            'id' => self::PARAM_INT,
            'patient_id' => self::PARAM_INT
        ) , "AND");
  }

  public function _getbypk()
  {

        return $this->getbypk(self::$tablename,self::$tableschema, array_key_first(self::$pk));
  }

  public function _update()
  {

        return $this->update(self::$tablename,self::$tableschema,self::$pk,'');
  }

  public function _getone()
  {

        return $this->getby(self::$tablename, self::$tableschema, array_key_first(self::$pk),array(
            'id' => self::PARAM_INT,
            'patient_id' => self::PARAM_INT
        ) , "AND");
  }

  public function getdata()
  {

        $arr = array();
        $arr['id'] = $this->id;
        $arr['steps'] = $this->steps;
        $arr['target'] = $this->target;
        $arr['create_time'] = $this->create_time;
        $arr['last_update'] = $this->last_update;
        $arr['patient_id']  = $this->patient_id;
        return $arr;
  }

}

