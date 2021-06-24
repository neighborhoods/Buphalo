<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Writer\Builder;

use Neighborhoods\Buphalo\V2\Actor\Writer\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
