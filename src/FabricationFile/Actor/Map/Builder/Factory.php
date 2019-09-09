<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\FabricationFile\Actor\Map\Builder;

use Neighborhoods\Buphalo\FabricationFile\Actor\Map\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getFabricationFileActorMapBuilder();
    }
}
