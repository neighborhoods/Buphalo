<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1;

use ErrorException;

class ErrorHandler implements ErrorHandlerInterface
{
    public function __invoke(
        int $errorNumber,
        string $errorString,
        string $errorFile,
        int $errorLine,
        array $errorContext = [] // deprecated in PHP 7.2, Removed in 8.0
    ): ErrorHandlerInterface {
        throw new ErrorException($errorString, $errorNumber, $errorNumber, $errorFile, $errorLine);
    }
}
