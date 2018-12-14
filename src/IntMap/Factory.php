<?php
declare(strict_types=1);

namespace Rhift\Bradfab\IntMap;

use Rhift\Bradfab\IntMapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): IntMapInterface
    {
        return clone $this->getIntMap();
    }
}
