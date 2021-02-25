<?php
namespace PROJECT\API;

class authorization {
  public function __invoke(\Psr\Http\Message\ServerRequestInterface $req, \Psr\Http\Message\ResponseInterface $res, $next)
  {

        $data = $req->getParsedBody();
        if(isset($data['admin_name']) && isset($data['admin_password'])  && $data['admin_name'] == 'osama' && $data['admin_password'] == 'osama2000')
        {
            $req = $req->withAttribute('status', 'sucess');
            $res = $next($req,$res);
        }
        else
        {
            $data_res = ['status' => 'fail','data' => '','error' => 'admin can\'t acess'];
            $res->getBody()->write(json_encode($data_res));
        }
        return $res;
  }

}

