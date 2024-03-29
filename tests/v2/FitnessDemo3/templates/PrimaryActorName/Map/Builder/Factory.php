<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Map\Builder;

use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Map\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getNamespacedPrimaryActorNameMapBuilder();
    }
}
