<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor;

use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\NeighborInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): NeighborInterface
    {
        return clone $this->getDORV1Neighbor();
    }
}
