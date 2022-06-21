<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\RelativeParentActorClassPath;

use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\RelativeParentActorClassPathInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): ParentActorNameInterface
    {
        return clone $this->getNamespacedParentActorName();
    }
}
