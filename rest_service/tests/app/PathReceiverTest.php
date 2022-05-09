<?php

namespace Tests\App;

use App\PathReceiver;
use GuzzleHttp\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

class PathReceiverTest extends TestCase
{
    public function testReceiveControllerPath()
    {
        $request = new ServerRequest('GET', 'http://localhost:8084/foo/bar');

        $sut = new PathReceiver($request);

        $this->assertEquals('foo', $sut->getControllerPath());
    }

    public function testReceiveControllerPathIsEmpty()
    {
        $request = new ServerRequest('GET', 'http://localhost:8084');

        $sut = new PathReceiver($request);

        $this->assertEquals('', $sut->getControllerPath());
    }

    public function testReceiveActionPath()
    {
        $request = new ServerRequest('GET', 'http://localhost:8084/foo/bar');

        $sut = new PathReceiver($request);

        $this->assertEquals('bar', $sut->getActionPath());
    }

    public function testReceiveActionPathIsEmpty()
    {
        $request = new ServerRequest('GET', 'http://localhost:8084');

        $sut = new PathReceiver($request);

        $this->assertEquals('', $sut->getActionPath());
    }


}