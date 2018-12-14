<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FloatingPointMap;

use Rhift\Bradfab\FloatingPointMapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): FloatingPointMapInterface
    {
        return clone $this->getFloatingPointMap();
    }
}
