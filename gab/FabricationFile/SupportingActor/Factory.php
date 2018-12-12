<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\SupportingActor;

use Rhift\Bradfab\FabricationFile\SupportingActorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): SupportingActorInterface
    {
        return clone $this->getSupportingActor();
    }
}
