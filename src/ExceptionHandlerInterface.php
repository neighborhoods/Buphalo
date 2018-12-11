<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

interface ExceptionHandlerInterface
{
    public function __invoke(\Throwable $throwable): ExceptionHandlerInterface;
}
