<?php
require dirname(__DIR__).'/vendor/autoload.php';

use App\Router;
use App\PathReceiver;
use GuzzleHttp\Psr7\ServerRequest;
use Psr\Http\Message\ResponseInterface;


(function () {
    $request = ServerRequest::fromGlobals();
    $pathReceiver = new PathReceiver($request);
    $router = new Router($pathReceiver);

    $controller = $router->getController();
    $action = $router->getAction();

    /** @var ResponseInterface $response */
     $response = $controller->$action();

     echo $response->getBody();
})();





