<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Writer\Builder;

use Neighborhoods\Bradfab\Actor\Writer\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
