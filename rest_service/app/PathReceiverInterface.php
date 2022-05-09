<?php

namespace App;

use Psr\Http\Message\ServerRequestInterface;

interface PathReceiverInterface
{
    public function __construct(ServerRequestInterface $request);

    public function getControllerPath(): string;

    public function getActionPath(): string;

    public function getRequest(): ServerRequestInterface;
}