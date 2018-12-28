<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\StringMap;

use Neighborhoods\Bradfab\StringMapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): StringMapInterface
    {
        return $this->getStringMap()->getArrayCopy();
    }
}
