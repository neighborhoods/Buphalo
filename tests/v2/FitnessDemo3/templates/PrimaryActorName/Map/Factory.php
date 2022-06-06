<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Map;

use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\MapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getNamespacedPrimaryActorNameMap()->getArrayCopy();
    }
}
