<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Fabricator\Builder;

use Neighborhoods\Buphalo\Fabricator\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
