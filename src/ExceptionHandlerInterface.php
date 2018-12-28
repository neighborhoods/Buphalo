<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

interface ExceptionHandlerInterface
{
    public function __invoke(\Throwable $throwable): ExceptionHandlerInterface;
}