<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor;

use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\NeighborInterface;

interface FactoryInterface
{
    public function create(): NeighborInterface;
}
