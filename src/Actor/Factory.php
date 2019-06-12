<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor;

use Neighborhoods\Bradfab\ActorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): ActorInterface
    {
        return clone $this->getActor();
    }
}
