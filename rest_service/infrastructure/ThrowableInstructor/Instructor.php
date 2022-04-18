<?php
declare(strict_types=1);

namespace Infrastructure\ThrowableInstructor;

interface Instructor extends \Throwable
{
    public function add(Instruction ...$instruction): self;

    public function work(): void;
}