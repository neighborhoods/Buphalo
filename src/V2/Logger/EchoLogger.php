<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Logger;

use Psr\Log\AbstractLogger;

class EchoLogger extends AbstractLogger
{
    public const CONTEXT_EXCEPTION = 'exception';

    public function log($level, $message, array $context = []): void
    {
        echo $message . PHP_EOL;
    }
}
