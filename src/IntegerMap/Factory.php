<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\IntegerMap;

use Neighborhoods\Bradfab\IntegerMapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): IntegerMapInterface
    {
        return clone $this->getIntegerMap();
    }
}
