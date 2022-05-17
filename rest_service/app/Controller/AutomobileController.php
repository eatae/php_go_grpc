<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Psr7\Response;

class AutomobileController extends Controller
{
    public function actionDefault(): ResponseInterface
    {
        return new Response(200, [], 'Default action');
    }
}
