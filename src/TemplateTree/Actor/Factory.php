<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Actor;

use Neighborhoods\Bradfab\TemplateTree\ActorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): ActorInterface
    {
        return clone $this->getActor();
    }
}
