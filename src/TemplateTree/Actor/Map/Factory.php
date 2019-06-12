<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Actor\Map;

use Neighborhoods\Bradfab\TemplateTree\Actor\MapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getActorMap()->getArrayCopy();
    }
}
