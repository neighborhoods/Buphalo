<?php
declare(strict_types=1);

namespace Neighborhoods\BradfabTemplateTree\Actor;

use Neighborhoods\BradfabTemplateTree\ActorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): ActorInterface
    {
        return clone $this->getActor();
    }
}
