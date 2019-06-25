<?php
declare(strict_types=1);

namespace Neighborhoods\BradfabTemplateTree\Actor\Builder;

use Neighborhoods\BradfabTemplateTree\Actor\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getActorBuilder();
    }
}
