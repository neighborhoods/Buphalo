<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\FloatingPointMap;

use Neighborhoods\Buphalo\V2\FloatingPointMapInterface;

interface FactoryInterface
{
    public function create(): FloatingPointMapInterface;
}
