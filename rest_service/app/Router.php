<?php

namespace App;

class Router
{
    protected Controller $controller;
    protected string $action;
    protected Request $request;


    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }



    protected function initController(Request $request)
    {

    }








    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }
    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }
    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }







}