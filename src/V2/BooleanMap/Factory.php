<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\BooleanMap;

use Neighborhoods\Buphalo\V2\BooleanMapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BooleanMapInterface
    {
        return clone $this->getBooleanMap();
    }
}
