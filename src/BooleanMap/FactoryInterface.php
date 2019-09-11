<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\BooleanMap;

use Neighborhoods\Buphalo\BooleanMapInterface;

interface FactoryInterface
{
    public function create(): BooleanMapInterface;
}
