<?php
declare(strict_types=1);

namespace Neighborhoods\BradfabTemplateTree\Actor\Map\Builder;

use Neighborhoods\BradfabTemplateTree\Actor\Map\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getActorMapBuilder();
    }
}
