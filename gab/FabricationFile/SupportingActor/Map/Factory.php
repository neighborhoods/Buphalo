<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\SupportingActor\Map;

use Rhift\BradFab\FabricationFile\SupportingActor\MapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getSupportingActorMap()->getArrayCopy();
    }
}
