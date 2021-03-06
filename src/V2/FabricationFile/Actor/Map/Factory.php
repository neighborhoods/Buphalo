<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\FabricationFile\Actor\Map;

use Neighborhoods\Buphalo\V2\FabricationFile\Actor\MapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getFabricationFileActorMap()->getArrayCopy();
    }
}
