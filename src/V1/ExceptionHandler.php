<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1;

use Throwable;

class ExceptionHandler implements ExceptionHandlerInterface
{
    public function __invoke(Throwable $throwable): ExceptionHandlerInterface
    {
        fwrite(STDERR, $throwable . PHP_EOL);

        exit(255);
    }
}
