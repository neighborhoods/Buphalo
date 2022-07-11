<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor;

use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\NeighborInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): NeighborInterface
    {
        return clone $this->getDORVersionNeighbor();
    }
}
