<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile\Actor\Map\Builder;

use Neighborhoods\Buphalo\V1\FabricationFile\Actor\Map\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getFabricationFileActorMapBuilder();
    }
}
