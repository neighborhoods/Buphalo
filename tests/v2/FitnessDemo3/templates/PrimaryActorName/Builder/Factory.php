<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Builder;

use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getNamespacedPrimaryActorNameBuilder();
    }
}
