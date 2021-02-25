<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\UploadedFileInterface;
use PROJECT\MODELS as model;

require_once VENDOR_PATH.DS.'autoload.php';

$config = [
    'settings' => [
        'displayErrorDetails' => true
    ]
];

$container = new \Slim\Container($config);

$app = new \Slim\App($container);

$app->group('/api',function (\Slim\App  $app){

    $app->group('/patient', function (\Slim\App $app){

        $app->post('/register', PROJECT\API\patient::class . ':register');
        $app->post('/login', PROJECT\API\patient::class . ':login');
        $app->post('/editprofile', PROJECT\API\patient::class . ":updateprofile");
        $app->post('/getimage', PROJECT\API\patient::class . ":getimage");
        $app->post('/updateimage', PROJECT\API\patient::class . ":updateimage");
        $app->post('/resetpassword', PROJECT\API\patient::class . ":resetpassword");
        

    });
    
    $app->group('/ecg', function (\Slim\App  $app){

        $app->post('/create', \PROJECT\API\ecg::class . ':create');
        $app->post('/delete', \PROJECT\API\ecg::class .':delete');
        $app->post('/getall', \PROJECT\API\ecg::class . ':getall');
        $app->post('/getone', \PROJECT\API\ecg::class . ':getone');
        
    });
    
    $app->group('/heartrate', function (\Slim\App  $app){
        
        $app->post('/create', PROJECT\API\heartrate::class  . ':create');
        $app->post('/delete', PROJECT\API\heartrate::class .':delete');
        $app->post('/getall', PROJECT\API\heartrate::class . ':getall');
        
    });
    
     $app->group('/steps', function (\Slim\App  $app){
        
        $app->post('/create', PROJECT\API\steps::class  . ':create');
        $app->post('/delete', PROJECT\API\steps::class .':delete');
        $app->post('/getall', PROJECT\API\steps::class . ':getall');
        $app->post('/update', PROJECT\API\steps::class . ':update');
        

    });
    
    $app->group('/doctor', function (\Slim\App  $app){
        $app->post('/getmydoctor', PROJECT\API\doctor::class . ':getmydoctor');
        $app->post('/getimage', PROJECT\API\doctor::class . ":getimage");
        $app->post('/getall', PROJECT\API\doctor::class . ":getall");
    });
    
})->add(\PROJECT\API\authorization::class);

$app->run();