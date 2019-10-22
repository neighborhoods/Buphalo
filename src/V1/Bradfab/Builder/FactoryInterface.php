<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Buphalo\Builder;

use Neighborhoods\Buphalo\V1\Buphalo\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
