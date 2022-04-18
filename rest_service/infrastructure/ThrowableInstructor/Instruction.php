<?php
declare(strict_types=1);

namespace Infrastructure\ThrowableInstructor;

interface Instruction
{
    public function follow(): void;
}