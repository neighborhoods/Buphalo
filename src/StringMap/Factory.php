<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\StringMap;

use Neighborhoods\Buphalo\StringMapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): StringMapInterface
    {
        return $this->getStringMap()->getArrayCopy();
    }
}
