<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1;

use Throwable;

class ExceptionHandler implements ExceptionHandlerInterface
{
    public function __invoke(Throwable $throwable): void
    {
        fwrite(STDERR, $throwable . PHP_EOL);

        exit(255);
    }
}
