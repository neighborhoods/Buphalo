<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTest\FabletDefinedTrees;

use Neighborhoods\BuphaloTest\FabletDefinedTreesInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): FabletDefinedTreesInterface
    {
        // This is the tertiary way of doing things
        return clone $this->getFabletDefinedTrees();
    }
}
