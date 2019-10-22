<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\BooleanMap;

use Neighborhoods\Buphalo\V1\BooleanMapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BooleanMapInterface
    {
        return clone $this->getBooleanMap();
    }
}
