<?php

namespace PROJECT\API;

class heartrate {
  use \PROJECT\CORE\validation;
  use \PROJECT\CORE\inputfilter;
  use \PROJECT\CORE\securedata;
  private $data_res =   ['status' => 'fail','data' =>[],'error'=>'no error'];

  private $createrole =   array(
        'patient_id'    => "req|int",
        'heart_rate'    => 'req'      
    );

  private $deleterole =   array(
        'patient_id'        => "req|int",
        'id'                => "req|int"
    );

  public function create(\Psr\Http\Message\ServerRequestInterface $req, \Psr\Http\Message\ResponseInterface $res)
  {

        $data = $req->getParsedBody();
        if($this->check_array_keys(array_keys($this->createrole),$data) && $this->isValid($this->createrole, $data))
        {
                $hear_rate = new \PROJECT\MODELS\heart_ratemodel();
                $hear_rate->patient_id = $this->filter_int($data['patient_id']);
                $hear_rate->heart_rate = $this->filter_int($data['heart_rate']);
                if($hear_rate->_create())
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
                $hear_rate = new \PROJECT\MODELS\heart_ratemodel();
                $hear_rate->patient_id = $this->filter_int($data['patient_id']);
                $hear_rate->id = $this->filter_int($data['id']);
                if($hear_rate->_delete())
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
            $hear_rate = new \PROJECT\MODELS\heart_ratemodel();
            $hear_rate->patient_id = $this->filter_int($data['patient_id']);
            $hear_rate_data = $hear_rate->_getall();
            if($hear_rate_data)
            {
                $this->data_res['status'] = 'sucess'; 
                $count = 1;
                foreach ($hear_rate_data as $key => $value)
                {
                    $this->data_res['data'][$count++] = $value->getdata();
                }
            }
            else
            {
                $this->data_res['error'] = "wrong patient id";
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

