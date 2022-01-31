<?php

use App\Controller;
use App\Router;

require dirname(__DIR__).'/vendor/autoload.php';

(function (){
    var_dump($_SERVER); exit;
    $r = new Router($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
    var_dump($r);
})();





