<?php
declare(strict_types=1);

namespace Rhift\Bradfab\StringMap;

use Rhift\Bradfab\StringMapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): StringMapInterface
    {
        return clone $this->getStringMap();
    }
}
