<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Writer;

use Neighborhoods\Bradfab\SupportingActor\WriterInterface;

interface FactoryInterface
{
    public function create(): WriterInterface;
}
