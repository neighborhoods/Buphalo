<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2;

use Throwable;

interface ExceptionHandlerInterface
{
    public function __invoke(Throwable $throwable): void;
}
