<?php
require dirname(__DIR__).'/vendor/autoload.php';

use App\Router;
use GuzzleHttp\Psr7\ServerRequest;
use App\PathReceiver;


(function () {
    $request = ServerRequest::fromGlobals();
    $pathReceiver = new PathReceiver($request);
    $router = new Router($pathReceiver);
    $router->getController()->run($pathReceiver->getActionPath());
    var_dump($router);


})();





