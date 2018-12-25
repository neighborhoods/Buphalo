<?php
declare(strict_types=1);

namespace Rhift\Bradfab\BooleanMap;

use Rhift\Bradfab\BooleanMapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BooleanMapInterface
    {
        return clone $this->getBooleanMap();
    }
}
