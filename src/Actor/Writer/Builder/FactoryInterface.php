<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Writer\Builder;

use Neighborhoods\Buphalo\Actor\Writer\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
