<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Buphalo\Builder;

use Neighborhoods\Buphalo\Buphalo\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
