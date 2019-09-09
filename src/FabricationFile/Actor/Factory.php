<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\FabricationFile\Actor;

use Neighborhoods\Buphalo\FabricationFile\ActorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): ActorInterface
    {
        return clone $this->getFabricationFileActor();
    }
}
