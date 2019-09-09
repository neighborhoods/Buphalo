<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\BooleanMap;

use Neighborhoods\Buphalo\BooleanMapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BooleanMapInterface
    {
        return clone $this->getBooleanMap();
    }
}
