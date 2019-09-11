<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\FabricationFile\Actor\Map;

use Neighborhoods\Buphalo\FabricationFile\Actor\MapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getFabricationFileActorMap()->getArrayCopy();
    }
}
