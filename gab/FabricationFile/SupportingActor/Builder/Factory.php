<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\SupportingActor\Builder;

use Rhift\BradFab\FabricationFile\SupportingActor\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getSupportingActorBuilder();
    }
}
