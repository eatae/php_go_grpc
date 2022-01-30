<?php

namespace App;

use App\Values\Color;
use App\Values\Concern;
use App\Values\Transmission;

class Automobile
{
    private Concern $concern;
    private Color $color;
    private Transmission $transmission;
    private int $enginePower;

    public function __construct(Concern $concern, Color $color, Transmission $transmission, int $enginePower)
    {
        $this->concern = $concern;
        $this->color = $color;
        $this->transmission = $transmission;
        $this->enginePower = $enginePower;
    }

    public function getConcern(): Concern
    {
        return $this->concern;
    }

    public function getColor(): Color
    {
        return $this->color;
    }

    public function getTransmission(): Transmission
    {
        return $this->transmission;
    }

    public function getEnginePower(): int
    {
        return $this->enginePower;
    }
}