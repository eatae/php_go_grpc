<?php

namespace Infrastructure\ThrowableInstructor;

class EchoInstruction implements Instruction
{
    private int $num;

    public function __construct(int $num)
    {
        $this->num = $num;
    }

    public function execute(): void
    {
        echo "Instruction ".$this->num." completed";
    }
}