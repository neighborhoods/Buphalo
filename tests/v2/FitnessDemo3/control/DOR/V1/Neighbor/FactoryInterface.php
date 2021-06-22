<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor;

use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\NeighborInterface;

interface FactoryInterface
{
    public function create(): NeighborInterface;
}
