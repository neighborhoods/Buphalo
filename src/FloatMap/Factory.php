<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FloatMap;

use Rhift\Bradfab\FloatMapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): FloatMapInterface
    {
        return clone $this->getFloatMap();
    }
}
