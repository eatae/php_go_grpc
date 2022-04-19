<?php
declare(strict_types=1);

namespace Infrastructure\ThrowableInstructor;

use PHPUnit\Framework\Exception;

class ThrowableInstructor extends Exception
    implements Instructor
{
    /** @var Instruction[] */
    protected array $instructions = [];

    /**
     * @param Instruction ...$instructions
     */
    public function add(Instruction ...$instructions): self
    {
        $this->instructions = array_merge($this->instructions, $instructions);

        return $this;
    }

    public function followInstructions(): void
    {
        foreach($this->instructions as $i) {
            $i->execute();
        }
    }

    /**
     * @return Instruction[]
     */
    public function getInstructions(): array
    {
        return $this->instructions;
    }
}