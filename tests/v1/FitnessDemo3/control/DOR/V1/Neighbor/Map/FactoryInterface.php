<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\Map;

use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
