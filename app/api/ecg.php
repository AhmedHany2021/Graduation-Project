<?php

namespace PROJECT\API;

class ecg {
  use \PROJECT\CORE\validation;
  use \PROJECT\CORE\inputfilter;
  use \PROJECT\CORE\securedata;
  private $data_res =   ['status' => 'fail','data' =>[],'error'=>'no error'];

  private $createrole =   array(
        'patient_id'    => "req|int",
        'read'          =>'req',
        'heart_rate'    => 'req'      
    );

  private $deleterole =   array(
        'patient_id'        => "req|int",
        'id'                => "req|int"
    );

  private $getonerole =   array(
        'patient_id'        => "req|int",
        'id'                => "req|int"
    );

  public function create(\Psr\Http\Message\ServerRequestInterface $req, \Psr\Http\Message\ResponseInterface $res)
  {

        $data = $req->getParsedBody();
        if($this->check_array_keys(array_keys($this->createrole),$data) && $this->isValid($this->createrole, $data))
        {
            if (is_array($data['read']))
            {
                $ecg = new \PROJECT\MODELS\ecgmodel();
                $ecg->patient_id = $this->filter_int($data['patient_id']);
                $ecg->ecg_read = serialize($data['read']);
                $ecg->heart_rate = $this->filter_int($data['heart_rate']);
                if($ecg->_create())
                {
                    $this->data_res['status'] = "sucess";
                }
                else
                {
                    $this->data_res['error'] = "can't be saved";
                }
            }
            else 
            {
                $this->data_res['error'] = 'must be array';
            }
        }
        else
        {
            $this->data_res['error'] = 'data is wrong';
        }
        $res->getBody()->write(json_encode($this->data_res));
        return $res;
  }

  public function delete(\Psr\Http\Message\ServerRequestInterface $req, \Psr\Http\Message\ResponseInterface $res)
  {

        $data = $req->getParsedBody();
        if($this->check_array_keys(array_keys($this->deleterole),$data) && $this->isValid($this->deleterole, $data))
        {
                $ecg = new \PROJECT\MODELS\ecgmodel();
                $ecg->patient_id = $this->filter_int($data['patient_id']);
                $ecg->id = $this->filter_int($data['id']);
                if($ecg->_delete())
                {
                    $this->data_res['status'] = "sucess";
                }
                else
                {
                    $this->data_res['error'] = "can't delete";
                }
        }
        else
        {
            $this->data_res['error'] = 'data is wrong';
        }
        $res->getBody()->write(json_encode($this->data_res));
        return $res;            
  }

  public function getall(\Psr\Http\Message\ServerRequestInterface $req, \Psr\Http\Message\ResponseInterface $res)
  {

        $data = $req->getParsedBody();
        if(isset($data['patient_id']) && $this->int($data['patient_id']))
        {
            $ecg = new \PROJECT\MODELS\ecgmodel();
            $ecg->patient_id = $data['patient_id'];
            $ecg_data = $ecg->_getall();
            if($ecg_data)
            {
                $this->data_res['status'] = 'sucess'; 
                $count = 1;
                foreach ($ecg_data as $key => $value)
                {
                    $this->data_res['data'][$count++] = $value->getdata();
                }
            }
            else
            {
                $this->data_res['error'] = "wront patient id";
            }
        }
        else
        {
            $this->data_res['error'] = 'data is wrong';
        }
        $res->getBody()->write(json_encode($this->data_res));
        return $res;   
  }

  public function getone(\Psr\Http\Message\ServerRequestInterface $req, \Psr\Http\Message\ResponseInterface $res)
  {

        $data = $req->getParsedBody();
        if($this->check_array_keys(array_keys($this->getonerole),$data) && $this->isValid($this->getonerole, $data))
        {
            $ecg = new \PROJECT\MODELS\ecgmodel();
            $ecg->patient_id = $data['patient_id'];
            $ecg->id = $data['id'];
            $ecg = $ecg->_getone();
            if($ecg)
            {
                $this->data_res['status'] = 'sucess'; 
                $this->data_res['data']= $ecg->getdata();
            }
            else
            {
                $this->data_res['error'] = "wront patient id or read id";
            }
        }
        else
        {
            $this->data_res['error'] = 'data is wrong';
        }
        $res->getBody()->write(json_encode($this->data_res));
        return $res;
  }

}

