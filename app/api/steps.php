<?php

namespace PROJECT\API;

class steps {
  use \PROJECT\CORE\validation;
  use \PROJECT\CORE\inputfilter;
  use \PROJECT\CORE\securedata;
  private $data_res =   ['status' => 'fail','error'=>'no error'];

  private $createrole =   array(
        'patient_id'    => "req|int",
        'steps'         => "req|int",
        'target'        => 'req|int'
    );

  private $updaterole =   array(
        'patient_id'    => "req|int",
        'steps'         => "req|int",
        'target'        => 'req|int'
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
                $steps = new \PROJECT\MODELS\stepsmodel();
                $steps->patient_id = $this->filter_int($data['patient_id']);
                $steps->steps = $this->filter_int($data['steps']);
                $steps->target = $this->filter_int($data['target']);
                if($steps->_create())
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
                $steps = new \PROJECT\MODELS\stepsmodel();
                $steps->patient_id = $this->filter_int($data['patient_id']);
                $steps->id = $this->filter_int($data['id']);
                if($steps->_delete())
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
            $steps = new \PROJECT\MODELS\stepsmodel();
            $steps->patient_id = $this->filter_int($data['patient_id']);
            $steps_data = $steps->_getall();
            if($steps_data)
            {
                $this->data_res['status'] = 'sucess'; 
                $count = 1;
                foreach ($steps_data as $key => $value)
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

  public function update(\Psr\Http\Message\ServerRequestInterface $req, \Psr\Http\Message\ResponseInterface $res)
  {

        $data = $req->getParsedBody();
        if($this->check_array_keys(array_keys($this->updaterole),$data) && $this->isValid($this->updaterole, $data))
        {
                $steps = new \PROJECT\MODELS\stepsmodel();
                $steps->patient_id = $this->filter_int($data['patient_id']);
                $steps->steps = $this->filter_int($data['steps']);
                $steps->target = $this->filter_int($data['target']);
                if($steps->_update())
                {
                    $this->data_res['status'] = "sucess";
                }
                else
                {
                    $this->data_res['error'] = "can't update";
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

