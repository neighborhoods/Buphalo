<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\IntegerMap;

use Neighborhoods\Buphalo\V1\IntegerMapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): IntegerMapInterface
    {
        return clone $this->getIntegerMap();
    }
}
