<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Writer;

use Neighborhoods\Bradfab\Actor\WriterInterface;

interface FactoryInterface
{
    public function create(): WriterInterface;
}
