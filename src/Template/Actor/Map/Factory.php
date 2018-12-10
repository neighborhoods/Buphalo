<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor\Map;

use Rhift\Bradfab\Template\Actor\MapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getBradfabTemplateActorMap()->getArrayCopy();
    }
}
