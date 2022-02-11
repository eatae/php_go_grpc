<?php

namespace App\Controller;

use App\Request;
use http\Client\Response;

class Controller
{
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function run(string $action): Response
    {
        $action = 'action'.ucfirst($action);
        if (!method_exists($this, $action)) {
            throw new \Exception("Action {$action} does not exists.");
        }
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }
}