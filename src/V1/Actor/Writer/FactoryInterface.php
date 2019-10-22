<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Writer;

use Neighborhoods\Buphalo\V1\Actor\WriterInterface;

interface FactoryInterface
{
    public function create(): WriterInterface;
}
