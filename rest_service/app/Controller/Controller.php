<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface;

class Controller
{
    protected ServerRequestInterface $request;
    protected string $actionDefault = 'actionDefault';

    public function __construct(ServerRequestInterface $request)
    {
        $this->request = $request;
    }

    public function run(?string $action)
    {
        if ($action == null) {

        }
        $action = 'action'.ucfirst($action);
        if (!method_exists($this, $action)) {
            throw new \Exception("Action {$action} does not exists.");
        }
    }

    public function getActionDefault()
    {
        return $this->actionDefault;
    }
}