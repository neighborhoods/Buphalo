<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\FabricationFile\Actor;

use Neighborhoods\Buphalo\V2\FabricationFile\ActorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): ActorInterface
    {
        return clone $this->getFabricationFileActor();
    }
}
