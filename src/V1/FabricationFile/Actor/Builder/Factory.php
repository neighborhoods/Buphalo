<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile\Actor\Builder;

use Neighborhoods\Buphalo\V1\FabricationFile\Actor\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getFabricationFileActorBuilder();
    }
}
