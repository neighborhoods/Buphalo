<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\SupportingActor;

use Neighborhoods\Bradfab\FabricationFile\SupportingActorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): SupportingActorInterface
    {
        return clone $this->getFabricationFileSupportingActor();
    }
}
