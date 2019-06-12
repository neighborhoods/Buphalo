<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor;

use Neighborhoods\Bradfab\SupportingActorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): SupportingActorInterface
    {
        return clone $this->getSupportingActor();
    }
}
