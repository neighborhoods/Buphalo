<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Logger;

use DateTimeImmutable;
use Psr\Log\AbstractLogger;
use Throwable;

class JsonLogger extends AbstractLogger
{
    public const CONTEXT_EXCEPTION = 'exception';

    public function log($level, $message, array $context = [])
    {
        if (isset($context[self::CONTEXT_EXCEPTION])) {
            /** @var Throwable $throwable */
            $throwable = $context[self::CONTEXT_EXCEPTION];

            $context[self::CONTEXT_EXCEPTION] = [
                'message' => $throwable->getMessage(),
                'trace' => $throwable->getTrace(),
                'file' => $throwable->getFile(),
                'line' => $throwable->getLine()
            ];
        }

        echo json_encode([
                'timestamp' => (new DateTimeImmutable())->format(DATE_ISO8601),
                'level' => $level,
                'message' => $message,
                'context' => $context,
            ]) . PHP_EOL;
    }
}
