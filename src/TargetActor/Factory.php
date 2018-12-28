<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor;

use Neighborhoods\Bradfab\TargetActorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): TargetActorInterface
    {
        return clone $this->getTargetActor();
    }
}
