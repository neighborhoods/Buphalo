<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor;

use Neighborhoods\Buphalo\V1\ActorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): ActorInterface
    {
        return clone $this->getActor();
    }
}
