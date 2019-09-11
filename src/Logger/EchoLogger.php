<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Logger;

use Psr\Log\AbstractLogger;

class EchoLogger extends AbstractLogger
{
    public const CONTEXT_EXCEPTION = 'exception';

    public function log($level, $message, array $context = [])
    {
        echo $message . PHP_EOL;
    }
}
