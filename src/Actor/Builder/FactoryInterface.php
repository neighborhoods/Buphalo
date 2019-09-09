<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Builder;

use Neighborhoods\Buphalo\Actor\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
