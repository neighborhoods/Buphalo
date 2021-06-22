<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Builder;

use Neighborhoods\Buphalo\V2\Actor\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
