<?php

namespace Tests\App;

use App\Controller\AutomobileController;
use App\EnumValue\RequestMethod;
use App\PathReceiver;
use Psr\Http\Message\ServerRequestInterface;
use App\Router;
use Tests\PHPUnitUtil;
use GuzzleHttp\Psr7\ServerRequest;

class RouterTest extends PHPUnitUtil
{
    private ServerRequestInterface $request;

    /**
     * Create action
     */
    public function testCreateAction()
    {
        $request = new ServerRequest('GET', "http://localhost:8084/foo/bar");
        $pathReceiver = new PathReceiver($request);

    }





    /**
     * initController
     */
    public function testInitController_EmptyUri()
    {
        $request = new RequestV2('/', $this->method);
        $ctrl = new AutomobileController();
        $sut = new Router($request);

        $this->assertEquals($ctrl, $sut->getController());
    }

    /**
     * initController
     */
    public function testInitController_NotFoundClass()
    {
        $request = new RequestV2('/foo', $this->method);

        $this->expectException(\Exception::class);
        new Router($request);
    }


}