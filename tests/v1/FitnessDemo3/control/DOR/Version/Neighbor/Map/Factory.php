<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\Map;

use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\MapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getDORVersionNeighborMap()->getArrayCopy();
    }
}
