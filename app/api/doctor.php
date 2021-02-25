<?php

namespace PROJECT\API;

class doctor {
  use \PROJECT\CORE\validation;
  use \PROJECT\CORE\inputfilter;
  use \PROJECT\CORE\securedata;
  private $data_res =   ['status' => 'fail','error'=>'no error'];

  private $getonerole =   array(
        'id'            => "req|int"
    );

  private $getimagerole =   array(
         'id'        => "req|int"
    );

  public function getmydoctor(\Psr\Http\Message\ServerRequestInterface $req, \Psr\Http\Message\ResponseInterface $res)
  {

        $data = $req->getParsedBody();
        if($this->check_array_keys(array_keys($this->getonerole),$data) && $this->isValid($this->getonerole, $data))
        {
            $doctor = new \PROJECT\MODELS\doctormodel();
            $doctor->id = $this->filter_int($data['id']);
            if($doctor = $doctor->_getbypk())
            {
                $this->data_res['status']  = 'sucess';
                $this->data_res['data'] = $doctor->getdata();
            }
            else
            {
                $this->data_res['error'] = 'No doctor with this id';
            }
        }
        else
        {
            $this->data_res['error'] = 'wrong data';
        }
        $res->getBody()->write(json_encode($this->data_res));
        return $res;

  }

  public function getimage(\Psr\Http\Message\ServerRequestInterface $req, \Psr\Http\Message\ResponseInterface $res)
  {

        $data = $req->getParsedBody();
        if($this->check_array_keys(array_keys($this->getimagerole), $data) && $this->isValid($this->getimagerole,$data))
        {
            $doctor = new \PROJECT\MODELS\doctormodel();
            $doctor->id = $this->filter_int($data['id']);
            $doctor = $doctor->_getbypk();
            $image = $doctor->image;
            $image = file_get_contents(IMAGES_UPLOAD_STORAGE.DS.$image);
        }
        $res->getBody()->write($image);
  }

  public function getall(\Psr\Http\Message\ServerRequestInterface $req, \Psr\Http\Message\ResponseInterface $res)
  {

        $doctor = new \PROJECT\MODELS\doctormodel();
        $doctor = $doctor->_getall();
        if($doctor)
        {
            $this->data_res['status'] = 'sucess'; 
            $count = 1;
            foreach ($doctor as $key => $value)
            {
                $this->data_res['data'][$count++] = $value->getdata();
            }

        }
        else
        {
            $this->data_res['error'] = 'no doctors';
        }
        $res->getBody()->write(json_encode($this->data_res));
        return $res;

  }

}

