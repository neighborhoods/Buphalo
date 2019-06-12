<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\SupportingActor\Map\Builder;

use Neighborhoods\Bradfab\FabricationFile\SupportingActor\Map\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getFabricationFileSupportingActorMapBuilder();
    }
}
