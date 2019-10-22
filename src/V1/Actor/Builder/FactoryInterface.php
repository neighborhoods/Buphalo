<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Builder;

use Neighborhoods\Buphalo\V1\Actor\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
