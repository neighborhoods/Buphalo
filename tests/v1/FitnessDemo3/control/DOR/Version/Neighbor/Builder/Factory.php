<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\Builder;

use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getDORVersionNeighborBuilder();
    }
}
