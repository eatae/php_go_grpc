<?php
declare(strict_types=1);

namespace Tests\Infrastructure\ThrowableInstructor;

use Infrastructure\ThrowableInstructor\Instruction;
use Infrastructure\ThrowableInstructor\ThrowableInstructor;
use PHPUnit\Framework\TestCase;
use Infrastructure\ThrowableInstructor\EchoInstruction;

class ThrowableInstructorTest extends TestCase
{
    private Instruction $firstInstruction;
    private Instruction $secondInstruction;

    private function createInstruction(): void
    {
        if (isset($this->firstInstruction) && isset($this->secondInstruction)) {
            return;
        }
        $this->firstInstruction = new EchoInstruction(1);
        $this->secondInstruction = new EchoInstruction(2);
    }

    public function testAdd()
    {
        $this->createInstruction();
        $sut = (new ThrowableInstructor('Instructor'))
            ->add($this->firstInstruction, $this->secondInstruction);

        $this->assertEquals(2, count($sut->getInstructions()));
    }

    public function testFollowInstructions()
    {
        $this->createInstruction();
        $sut = (new ThrowableInstructor('Instructor'))
            ->add($this->firstInstruction, $this->secondInstruction);

        $expected = "Instruction 1 completed" . "Instruction 2 completed";

        $this->expectOutputString($expected, $sut->followInstructions());
    }
}