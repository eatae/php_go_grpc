<?php

namespace Tests\App;

use App\PathReceiver;
use App\Router;
use Tests\PHPUnitUtil;
use GuzzleHttp\Psr7\ServerRequest;

class RouterTest extends PHPUnitUtil
{
    /**
     * Get Controller
     */
    public function testGetController()
    {
        $request = new ServerRequest('GET', "http://localhost:8084/mock/foo");
        $pathReceiver = new PathReceiver($request);

        $sut = new Router($pathReceiver, 'Tests\App\Controller');

        $this->assertInstanceOf('Tests\App\Controller\MockController', $sut->getController());
    }

    /**
     * Get default Controller
     */
    public function testGetDefaultController()
    {
        $request = new ServerRequest('GET', "http://localhost:8084");
        $pathReceiver = new PathReceiver($request);

        $sut = new Router(
            $pathReceiver,
            'Tests\App\Controller',
            'MockController',
        );

        $this->assertInstanceOf('Tests\App\Controller\MockController', $sut->getController());
    }

    /**
     * Get action
     */
    public function testGetAction()
    {
        $request = new ServerRequest('GET', "http://localhost:8084/mock/foo");
        $pathReceiver = new PathReceiver($request);

        $sut = new Router($pathReceiver, 'Tests\App\Controller');

        $this->assertEquals('actionFoo', $sut->getAction());
    }

    /**
     * Get default action
     */
    public function testGetDefaultAction()
    {
        $request = new ServerRequest('GET', "http://localhost:8084");
        $pathReceiver = new PathReceiver($request);

        $sut = new Router(
            $pathReceiver,
            'Tests\App\Controller',
            'MockController',
        );
        $defaultAction = $sut->getController()->getActionDefault();

        $this->assertEquals($defaultAction, $sut->getAction());
    }
}
