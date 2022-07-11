<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2;

interface ErrorHandlerInterface
{
    public function __invoke(
        int $errorNumber,
        string $errorString,
        string $errorFile,
        int $errorLine,
        array $errorContext
    );
}
