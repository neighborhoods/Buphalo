<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\Map;

use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\MapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getDORV1NeighborMap()->getArrayCopy();
    }
}
