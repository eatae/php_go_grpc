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

    public function getActionDefault(): string
    {
        return $this->actionDefault;
    }
}
