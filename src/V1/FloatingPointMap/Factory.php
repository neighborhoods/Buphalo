<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FloatingPointMap;

use Neighborhoods\Buphalo\V1\FloatingPointMapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): FloatingPointMapInterface
    {
        return clone $this->getFloatingPointMap();
    }
}
