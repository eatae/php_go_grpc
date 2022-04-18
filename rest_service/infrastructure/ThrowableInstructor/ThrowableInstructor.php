<?php
declare(strict_types=1);

namespace Infrastructure\ThrowableInstructor;

use PHPUnit\Framework\Exception;

class ThrowableInstructor extends Exception
    implements Instructor
{
    /**
     * @var Instruction[]
     */
    protected array $instructions = [];

    /**
     * @param Instruction[] $instructions
     */
    public function add(Instruction ...$instructions): self
    {
        array_merge($this->instructions, $instructions);

        return $this;
    }

    public function work(): void
    {
        // TODO: Implement work() method.
    }
}