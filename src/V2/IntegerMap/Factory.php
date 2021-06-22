<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\IntegerMap;

use Neighborhoods\Buphalo\V2\IntegerMapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): IntegerMapInterface
    {
        return clone $this->getIntegerMap();
    }
}
