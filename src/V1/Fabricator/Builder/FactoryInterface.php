<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Fabricator\Builder;

use Neighborhoods\Buphalo\V1\Fabricator\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
