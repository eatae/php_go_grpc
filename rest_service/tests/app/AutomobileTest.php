<?php

namespace Tests\App;

use App\Automobile;
use App\EnumValue\Color;
use App\EnumValue\Concern;
use App\EnumValue\Transmission;
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