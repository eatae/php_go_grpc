<?php

use App\Controller;
use App\Router;
use App\Request;
use App\EnumValue\RequestMethod;

require dirname(__DIR__).'/vendor/autoload.php';

(function (){
    var_dump($_SERVER);
    $requestMethod = RequestMethod::byValue($_SERVER['REQUEST_METHOD']);
    $request = new Request($_SERVER['REQUEST_URI'], $requestMethod);

    $r = new Router($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
    var_dump($r);
})();





