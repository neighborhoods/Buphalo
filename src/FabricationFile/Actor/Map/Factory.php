<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\Actor\Map;

use Neighborhoods\Bradfab\FabricationFile\Actor\MapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getFabricationFileActorMap()->getArrayCopy();
    }
}
