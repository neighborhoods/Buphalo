<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Writer;

use Neighborhoods\Bradfab\TargetActor\WriterInterface;

interface FactoryInterface
{
    public function create(): WriterInterface;
}
