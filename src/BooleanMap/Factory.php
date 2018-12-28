<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\BooleanMap;

use Neighborhoods\Bradfab\BooleanMapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BooleanMapInterface
    {
        return clone $this->getBooleanMap();
    }
}
