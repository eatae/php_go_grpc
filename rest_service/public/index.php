<?php
require dirname(__DIR__).'/vendor/autoload.php';

use App\Router;
use GuzzleHttp\Psr7\ServerRequest;


(function (){
    $request = ServerRequest::fromGlobals();

    var_dump($request);

    $r = new Router($request);
    var_dump($r);
})();





