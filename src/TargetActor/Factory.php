<?php
declare(strict_types=1);

namespace Rhift\Bradfab\TargetActor;

use Rhift\Bradfab\TargetActorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): TargetActorInterface
    {
        return clone $this->getTargetActor();
    }
}
