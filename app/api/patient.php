<?php

namespace PROJECT\API;


use PROJECT\CORE\fileupload;

class patient {
  use \PROJECT\CORE\validation;
  use \PROJECT\CORE\inputfilter;
  use \PROJECT\CORE\securedata;
  private $data_res =   ['status' => 'fail','data' =>'','error'=>'no error'];

  private $patientregisterole =   array(
        'name'      => "req|alpha|min(5)|max(60)",
        'phone'     => "req|int|min(11)|max(30)",
        'email'     => "req|email",
        'password'  => "req|alphanum|eq_field(password2)"
    );

  private $loginrole =   array(
        'email' => "req|email",
        'password'  => "req|alphanum|max(60)"
    );

  private $profilerole =   array(
        'id'        => "req|int",
        'name'      => "req|alpha|min(5)|max(60)",
        'gender'    => "req|alpha|max(1)",
        'weight'    => "req|num|max(3)",
        'height'    => "req|num|max(3)"
    );

  private $getimagerole =   array(
        'id'        => "req|int"
    );

  private $passwordrole =   array(
        'id'        => "req|int",
        'password'      => "req|alphanum|eq_field(password2)",
        'oldpassword'   => "req|alphanum"
    );

  public function register(\Psr\Http\Message\ServerRequestInterface $req, \Psr\Http\Message\ResponseInterface $res)
  {

        $data = $req->getParsedBody();
        
        if($this->check_array_keys(array_keys($this->patientregisterole), $data) && $this->isValid($this->patientregisterole,$data))
        {
            $patient = new \PROJECT\MODELS\patientmodel();
            $patient->user_name = $this->filter_string($data['name']);
            $patient->email = $this->filter_string($data['email']);
            $patient->phone = $this->filter_string($data['phone']);
            $patient->password = $this->filter_string($this->hash($data['password']));
            if($patient = $patient->signup())
            {
                $this->data_res['status'] = 'sucess';
            }
            else
            {
                $this->data_res['error'] = 'phone or email is already used';
            }

        }
        else
        {
            $this->data_res['error'] = 'data is wrong';
        }
        $res->getBody()->write(json_encode($this->data_res));
        return $res;
  }

  public function login(\Psr\Http\Message\ServerRequestInterface $req, \Psr\Http\Message\ResponseInterface $res)
  {

        $data = $req->getParsedBody();
        if($this->check_array_keys(array_keys($this->loginrole), $data) && $this->isValid($this->loginrole,$data))
        {
            $patient = new \PROJECT\MODELS\patientmodel();
            $patient->email = $this->filter_string($data['email']);
            $patient->password = $this->filter_string($this->hash($data['password']));
            if($patient = $patient->login(1))
            {
                $this->data_res['status'] = 'sucess';
                $this->data_res['data'] = $patient->getdata();
            }
            else
            {
                $this->data_res['error'] = 'wrong email or password';
            }
        }
        else
        {
            $this->data_res['error'] = 'data is wrong';
        }
        $res->getBody()->write(json_encode($this->data_res));
  }

  public function updateprofile(\Psr\Http\Message\ServerRequestInterface $req, \Psr\Http\Message\ResponseInterface $res)
  {

        $data = $req->getParsedBody();
        if($this->check_array_keys(array_keys($this->profilerole), $data) && $this->isValid($this->profilerole,$data))
        {
            $patient = new \PROJECT\MODELS\patientmodel();
            $patient->id = $this->filter_int($data['id']);
            $patient = $patient->_getbypk();
            $patient->user_name = $this->filter_string($data['name']);
            $patient->gender = $this->filter_string($data['gender']);
            $patient->weight = $this->filter_int($data['weight']);
            $patient->height = $this->filter_int($data['height']);
            if($patient->_update())
            {
                $this->data_res['status'] = 'sucess';
            }
            else
            {
                $this->data_res['error'] = 'invalid update operation';
            }
        }
        else
        {
            $this->data_res['error'] = 'data is wrong';
        }
        $res->getBody()->write(json_encode($this->data_res));
  }

  public function updateimage(\Psr\Http\Message\ServerRequestInterface $req, \Psr\Http\Message\ResponseInterface $res)
  {

        $data = $req->getParsedBody();
        $files = $req->getUploadedFiles();
        if(isset($data['id']) && $this->int($data['id']))
        {
            $patient =new \PROJECT\MODELS\patientmodel();
            $patient->id  = $data['id'];
            if($patient = $patient->_getbypk())
            {
                if(isset($files['img']))
                {
                    $file = [];
                    $img = $files['img'];
                    $file['name'] = $img->getClientFilename();
                    $file['type'] = $img->getClientMediaType();
                    $file['size'] = $img->getSize();
                    $file['error'] = $img->getError();
                    $file['tmp_name'] = $img->file;
                    $upfile = new fileupload($file);
                    try
                    {
                        $name = $upfile->upload()->getFileName();
                        $i = $patient->image;
                        if(isset($i))
                        {
                            unlink(IMAGES_UPLOAD_STORAGE.DS.$patient->image);
                        }
                        $patient->image = $name;
                        if($patient->_update())
                        {
                            $this->data_res['status'] = "sucess";
                            $patient = $patient->_getbypk();
                            $this->data_res['data'] = $patient->getdata();
                        }
                    } catch (Exception $ex) {
                        $this->data_res['status'] = "fail";
                    }
             }
            }
        }
        else 
        {
            $this->data_res['error'] = 'data is wrong';
        }
        $res->getBody()->write(json_encode($this->data_res));
  }

  public function getimage(\Psr\Http\Message\ServerRequestInterface $req, \Psr\Http\Message\ResponseInterface $res)
  {

        $data = $req->getParsedBody();
        if($this->check_array_keys(array_keys($this->getimagerole), $data) && $this->isValid($this->getimagerole,$data))
        {
            $patient = new \PROJECT\MODELS\patientmodel();
            $patient->id = $this->filter_int($data['id']);
            $patient = $patient->_getbypk();
            $image = $patient->image;
            $image = file_get_contents(IMAGES_UPLOAD_STORAGE.DS.$image);
        }
        $res->getBody()->write($image);
  }

  public function resetpassword(\Psr\Http\Message\ServerRequestInterface $req, \Psr\Http\Message\ResponseInterface $res)
  {

        $data = $req->getParsedBody();
        if($this->check_array_keys(array_keys($this->passwordrole), $data) && $this->isValid($this->passwordrole,$data))
        {
            $patient =new \PROJECT\MODELS\patientmodel();
            $patient->id  = $data['id'];
            if($patient = $patient->_getbypk())
            {
                if($patient->password == $this->hash($_POST['oldpassword']))
                {
                    $patient->password = $this->hash($_POST['password']);
                    if($patient->_update())
                    {
                        $this->data_res['status'] = "sucess";
                    }
                }
                else 
                {
                    $this->data_res['error'] = 'wrong old password';
                }
            }
            else 
            {
                $this->data_res['error'] = 'wrong id';
            }
        }
        else 
        {
            $this->data_res['error'] = 'data is wrong';
        }
        $res->getBody()->write(json_encode($this->data_res));
  }

}

