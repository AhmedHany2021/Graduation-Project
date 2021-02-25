<?php

namespace PROJECT\MODELS;

class ecgmodel extends abstractmodel {
  private $id;

  private $ecg_read;

  private $heart_rate;

  private $comment =   '';

  private $privilage =   0;

  private $create_time =   '';

  private $patient_id;

  private static $tablename =   'ecg';

  private static $pk =   array('id' => self::PARAM_INT);

  private static $tableschema =   array(
        'ecg_read' => self::PARAM_STR,
        'heart_rate' => self::PARAM_STR,
        'comment' => self::PARAM_STR,
        'privilage' => self::PARAM_INT,
        'patient_id' => self::PARAM_INT
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
        return $this->create(self::$tablename, self::$tableschema);
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
        $arr['ecg_read'] = $this->ecg_read;
        $arr['heart_rate'] = $this->heart_rate;
        $arr['comment'] = $this->comment;
        $arr['privilage'] = $this->privilage;
        $arr['create_time'] = $this->create_time;
        $arr['patient_id']  = $this->patient_id;
        return $arr;
  }

}

