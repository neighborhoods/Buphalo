<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FloatingPointMap;

use Neighborhoods\Buphalo\V1\FloatingPointMapInterface;

interface FactoryInterface
{
    public function create(): FloatingPointMapInterface;
}
