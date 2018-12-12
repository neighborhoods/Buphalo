<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\SupportingActor\Map\Builder;

use Rhift\BradFab\FabricationFile\SupportingActor\Map\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getSupportingActorMapBuilder();
    }
}
