<?php

namespace App\Controller;

use App\RequestV2;

class Controller
{
    protected RequestV2 $request;

    public function __construct(RequestV2 $request)
    {
        $this->request = $request;
    }
    

    public function run(string $action)
    {
        $action = 'action'.ucfirst($action);
        if (!method_exists($this, $action)) {
            throw new \Exception("Action {$action} does not exists.");
        }
    }

    /**
     * @return RequestV2
     */
    public function getRequest(): RequestV2
    {
        return $this->request;
    }
}