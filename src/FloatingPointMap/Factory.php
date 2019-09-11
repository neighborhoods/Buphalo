<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\FloatingPointMap;

use Neighborhoods\Buphalo\FloatingPointMapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): FloatingPointMapInterface
    {
        return clone $this->getFloatingPointMap();
    }
}
