<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetPrimaryActor;

use Neighborhoods\Bradfab\TargetPrimaryActorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): TargetPrimaryActorInterface
    {
        return clone $this->getTargetPrimaryActor();
    }
}
