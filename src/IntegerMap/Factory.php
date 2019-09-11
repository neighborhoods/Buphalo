<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\IntegerMap;

use Neighborhoods\Buphalo\IntegerMapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): IntegerMapInterface
    {
        return clone $this->getIntegerMap();
    }
}
