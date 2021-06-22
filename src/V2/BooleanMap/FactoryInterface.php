<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\BooleanMap;

use Neighborhoods\Buphalo\V2\BooleanMapInterface;

interface FactoryInterface
{
    public function create(): BooleanMapInterface;
}
