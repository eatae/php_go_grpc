<?php
require dirname(__DIR__).'/vendor/autoload.php';

use App\Router;
use GuzzleHttp\Psr7\ServerRequest;
use App\PathReceiver;


(function (){
    $request = ServerRequest::fromGlobals();
    $pathReceiver = new PathReceiver($request);
    $r = new Router($pathReceiver);
    var_dump($r);


})();





