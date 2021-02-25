<?php

namespace PROJECT\MODELS;

class doctormodel extends abstractmodel {
  private $id =   '';

  private $user_name =   '';

  private $email =   '';

  private $phone =   '';

  private $password =   '';

  private $image =   '';

  private $specialization =   '';

  private $description =   '';

  private $country =   '';

  private $city =   '';

  private $address =   '';

  private $price =   '';

  private $rate =   '';

  private $rate_num =   '';

  private $lang =   '';

  private $create_time;

  private $last_login;

  private static $tablename =   'doctor';

  private static $pk =   array('id'  => self::PARAM_INT);

  private static $tableschema =   array(
        'user_name' => self::PARAM_STR,
        'email' => self::PARAM_STR,
        'phone' => self::PARAM_STR,
        'password' => self::PARAM_STR,
        'image' => self::PARAM_STR,
        'specialization' => self::PARAM_STR,
        'description' => self::PARAM_STR,
        'country' =>self::PARAM_STR,
        'city' =>self::PARAM_STR,
        'address' =>self::PARAM_STR,
        'price' =>self::PARAM_STR,
        'rate' =>self::PARAM_FLOAT,
        'rate_num' =>self::PARAM_INT,
        'lang' => self::PARAM_STR,
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

  public function _getall()
  {
        return $this->getall(self::$tablename,self::$tableschema, array_key_first(self::$pk));
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
        $data['specialization'] = $this->specialization; 
        $data['description'] = $this->description;
        $data['country'] = $this->country;   
        $data['city'] = $this->city;   
        $data['address'] = $this->address;   
        $data['price'] = $this->price;   
        $data['rate'] = $this->rate;   
        $data['rate_num'] = $this->rate_num;   
        $data['create_time'] = $this->create_time; 
        $data['last_login'] = $this->last_login;
        return $data;
  }

}

