<?php

namespace App;

use App\EnumValue\Color;
use App\EnumValue\Concern;
use App\EnumValue\Transmission;

class Automobile
{
    private string $name;
    private Concern $concern;
    private Color $color;
    private Transmission $transmission;
    private int $enginePower;

    /**
     * @param string $name
     * @param Concern $concern
     * @param Color $color
     * @param Transmission $transmission
     * @param int $enginePower
     */
    public function __construct(
        string $name,
        Concern $concern,
        Color $color,
        Transmission
        $transmission,
        int
        $enginePower
    ) {
        $this->name = $name;
        $this->concern = $concern;
        $this->color = $color;
        $this->transmission = $transmission;
        $this->enginePower = $enginePower;
    }

    public function getName()
    {
        return $this->name;
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
