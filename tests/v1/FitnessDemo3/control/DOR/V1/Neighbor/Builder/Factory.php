<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\Builder;

use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getDORV1NeighborBuilder();
    }
}
