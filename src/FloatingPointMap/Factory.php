<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FloatingPointMap;

use Neighborhoods\Bradfab\FloatingPointMapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): FloatingPointMapInterface
    {
        return clone $this->getFloatingPointMap();
    }
}
