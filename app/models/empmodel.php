<?php
namespace PROJECT\MODELS;

class empmodel extends abstractmodel {
  private $id;

  private $user_name;

  private $password;

  private $salary;

  protected static $tablename =   'emp';

  protected static $tableschema =   array (
        'user_name' => self ::PARAM_STR,
        'password' => self ::PARAM_STR,
        'salary' => self ::PARAM_INT
    );

  protected static $pk =   array('id' =>self :: PARAM_INT);

  public function __construct()
  {

        $get_arguments       = func_get_args();
        $number_of_arguments = func_num_args();

        if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {
            call_user_func_array(array($this, $method_name), $get_arguments);
        }
  }

  public function __construct4($id, $user_name, $password, $salary)
  {

        $this->id = $id;
        $this->user_name = $user_name;
        $this->password = $password;
        $this->salary =$salary;
  }

  public function __set($name, $value)
  {

        $this->$name = $value;
  }

  public function __get($name)
  {

        return $this->$name;
  }

  public function _getall()
  {

       return $this->getall(self::$tablename, self::$tableschema, array_key_first(self::$pk));
  }

  public function _create()
  {

       return $this->create(self::$tablename, self::$tableschema);
  }

  public function _getbypk()
  {

       return $this->getbypk(self::$tablename, self::$tableschema, array_key_first(self::$pk));
  }

  public function _update()
  {

       return $this->update(self::$tablename, self::$tableschema, self::$pk,"");
  }

  public function _delete()
  {

       return $this->delete(self::$tablename ,self::$pk,"");
  }

}

