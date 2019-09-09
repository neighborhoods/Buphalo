<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\FabricationFile\Actor\Builder;

use Neighborhoods\Buphalo\FabricationFile\Actor\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getFabricationFileActorBuilder();
    }
}
