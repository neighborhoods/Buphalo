<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Writer;

use Neighborhoods\Buphalo\V2\Actor\WriterInterface;

interface FactoryInterface
{
    public function create(): WriterInterface;
}
