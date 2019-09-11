<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\FloatingPointMap;

use Neighborhoods\Buphalo\FloatingPointMapInterface;

interface FactoryInterface
{
    public function create(): FloatingPointMapInterface;
}
