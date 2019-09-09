<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor;

use Neighborhoods\Buphalo\ActorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): ActorInterface
    {
        return clone $this->getActor();
    }
}
