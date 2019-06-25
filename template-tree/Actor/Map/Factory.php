<?php
declare(strict_types=1);

namespace Neighborhoods\BradfabTemplateTree\Actor\Map;

use Neighborhoods\BradfabTemplateTree\Actor\MapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getActorMap()->getArrayCopy();
    }
}
