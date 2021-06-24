<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\FloatingPointMap;

use Neighborhoods\Buphalo\V2\FloatingPointMapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): FloatingPointMapInterface
    {
        return clone $this->getFloatingPointMap();
    }
}
