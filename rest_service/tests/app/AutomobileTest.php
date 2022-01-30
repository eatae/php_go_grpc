<?php

namespace Tests\App;

use App\Automobile;
use App\Values\Color;
use App\Values\Concern;
use App\Values\Transmission;
use PHPUnit\Framework\TestCase;

class AutomobileTest extends TestCase
{

    public function testConstructor()
    {
        $concern = Concern::get(Concern::LEXUS);
        $color = Color::get(Color::WHITE);
        $transmission = Transmission::get(Transmission::AUTOMATIC);
        $power = 120;

        $sut = new Automobile($concern, $color, $transmission, $power);

        $this->assertEquals($transmission, $sut->getTransmission());
    }
}

