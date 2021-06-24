<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\StringMap;

use Neighborhoods\Buphalo\V2\StringMapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): StringMapInterface
    {
        return $this->getStringMap()->getArrayCopy();
    }
}
