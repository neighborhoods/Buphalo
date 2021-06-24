<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\PrimaryActorName;

use Neighborhoods\BuphaloTemplateTree\PrimaryActorNameInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): PrimaryActorNameInterface
    {
        // This is the tertiary way of doing things
        return clone $this->getPrimaryActorName();
    }
}
