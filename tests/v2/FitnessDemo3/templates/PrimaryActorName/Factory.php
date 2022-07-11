<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName;

use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorNameInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): PrimaryActorNameInterface
    {
        return clone $this->getNamespacedPrimaryActorName();
    }
}
