<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Fabricator\Builder;

use Neighborhoods\Buphalo\V2\Fabricator\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
