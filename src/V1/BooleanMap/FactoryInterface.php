<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\BooleanMap;

use Neighborhoods\Buphalo\V1\BooleanMapInterface;

interface FactoryInterface
{
    public function create(): BooleanMapInterface;
}
