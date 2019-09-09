<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Writer;

use Neighborhoods\Buphalo\Actor\WriterInterface;

interface FactoryInterface
{
    public function create(): WriterInterface;
}
