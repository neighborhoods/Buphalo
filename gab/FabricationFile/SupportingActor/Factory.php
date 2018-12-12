<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\SupportingActor;

use Rhift\BradFab\FabricationFile\SupportingActorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): SupportingActorInterface
    {
        return clone $this->getSupportingActor();
    }
}
