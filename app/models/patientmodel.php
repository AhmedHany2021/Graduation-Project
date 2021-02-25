<?php

namespace PROJECT\MODELS;

class patientmodel extends abstractmodel {
  private $id =   '';

  private $user_name =   '';

  private $email =   '';

  private $phone =   '';

  private $password =   '';

  private $image =   '';

  private $gender =   '';

  private $weight =   '';

  private $height =   '';

  private $medical_history =   '';

  private $lang =   '';

  private $doctor_id =   '';

  private $create_time;

  private $last_login;

  private static $tablename =   'patient';

  private static $pk =   array('id'  => self::PARAM_INT);

  private static $tableschema =   array(
        'user_name' => self::PARAM_STR,
        'email' => self::PARAM_STR,
        'phone' => self::PARAM_STR,
        'password' => self::PARAM_STR,
        'image' => self::PARAM_STR,
        'gender' => self::PARAM_STR,
        'weight' => self::PARAM_STR,
        'height' => self::PARAM_STR,
        'medical_history' =>self::PARAM_STR,
        'lang' => self::PARAM_STR,
        'doctor_id' =>self :: PARAM_INT,
        'create_time' => self::PARAM_STR,
        'last_login' => self::PARAM_STR
    );

  private static $signupschema =   array(
        'user_name' => self::PARAM_STR,
        'email' => self::PARAM_STR,
        'phone' => self::PARAM_STR,
        'password' => self::PARAM_STR
    );

  private static $login_phoneschema =   array(
        'phone' => self::PARAM_STR,
        'password' => self::PARAM_STR
    );

  private static $login_emailschema =   array(
        'email' => self::PARAM_STR,
        'password' => self::PARAM_STR
    );

  public function __construct()
  {

        $get_arguments       = func_get_args();
        $number_of_arguments = func_num_args();

        if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {
            call_user_func_array(array($this, $method_name), $get_arguments);
        }
  }

  public function __construct14($id, $user_name, $email, $phone, $password, $image, $gender, $weight, $height, $medical_history, $lang, $doctor_id, $create_time, $last_login)
  {

        $this->id = $id;
        $this->user_name = $user_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
        $this->image = $image;
        $this->gender = $gender;
        $this->weight = $weight;
        $this->height = $height;
        $this->medical_history = $medical_history;
        $this->lang = $lang;
        $this->doctor_id = $doctor_id;
        $this->create_time = $create_time;
        $this->last_login  =$last_login;
  }

  public function __set($key, $value)
  {

        $this->$key = $value;
  }

  public function __get($key)
  {

        return $this->$key;
  }

  public function _create()
  {

        return $this->create(self::$tablename, self::$tableschema);
  }

  public function _delete()
  {

        return $this->delete(self::$tablename, self::$pk , '');
  }

  public function _update()
  {

        return $this->update(self::$tablename, self::$tableschema, self::$pk,"");
  }

  public function _getbypk()
  {

        return $this->getbypk(self::$tablename, self::$tableschema, array_key_first(self::$pk));
  }

  public function signup()
  {

        if($this->create(self::$tablename, self::$signupschema))
        {
            return true;
        }
        else
        {
            return false;
        }
  }

  public function login($login_type)
  {

        if($login_type == 1)
        {
            return $this->getby(self::$tablename, self::$tableschema, array_key_first(self::$pk), self::$login_emailschema , "AND");
        }
        else if($login_type == 2)
        {
            return $this->getby(self::$tablename, self::$tableschema, array_key_first(self::$pk), self::$login_phoeschema , "AND");
        }
        else
        {
            return false;
        }
  }

  public function check_email($email)
  {

        $this->email = $email;
        $check = $this->getby(self::$tablename, self::$tableschema ,array_key_first(self::$pk) , array('email' => self::PARAM_STR) , '');
        return !($check);
  }

  public function check_phone($phone)
  {

        $this->phone = $phone;
        $check = $this->getby(self::$tablename, self::$tableschema ,array_key_first(self::$pk) , array('phone' => self::PARAM_STR) , '');
        return !($check);
  }

  public function getdata()
  {

        $data = array();
        $data['id'] = $this->id;
        $data['user_name'] = $this->user_name; 
        $data['email'] = $this->email; 
        $data['phone'] = $this->phone;
        $data['image'] = $this->image; 
        $data['gender'] = $this->gender; 
        $data['weight'] = $this->weight;
        $data['height'] = $this->height; 
        $data['medical_history'] = $this->medical_history;  
        $data['doctor_id'] = $this->doctor_id; 
        $data['create_time'] = $this->create_time; 
        $data['last_login'] = $this->last_login;
        return $data;
  }

  public function _getbydoc()
  {

        return $this->getallby(self::$tablename, self::$tableschema, array_key_first(self::$pk), array('doctor_id' =>self :: PARAM_INT), '');
  }

  public function _getonebydoc()
  {

        return $this->getby(self::$tablename, self::$tableschema, array_key_first(self::$pk), array(
            'doctor_id' =>self :: PARAM_INT,
            'id'  => self::PARAM_INT
        ), "AND");
  }

}

