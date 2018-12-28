<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\SupportingActor\Map;

use Neighborhoods\Bradfab\FabricationFile\SupportingActor\MapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getFabricationFileSupportingActorMap()->getArrayCopy();
    }
}
