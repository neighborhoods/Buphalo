<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Actor\Map\Builder;

use Neighborhoods\Bradfab\TemplateTree\Actor\Map\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getActorMapBuilder();
    }
}
