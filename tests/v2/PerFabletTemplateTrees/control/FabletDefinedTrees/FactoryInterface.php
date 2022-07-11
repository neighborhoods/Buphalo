<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTest\FabletDefinedTrees;

use Neighborhoods\BuphaloTest\FabletDefinedTreesInterface;

interface FactoryInterface
{
    // This is the primary way of doing things
    public function create(): FabletDefinedTreesInterface;
}
