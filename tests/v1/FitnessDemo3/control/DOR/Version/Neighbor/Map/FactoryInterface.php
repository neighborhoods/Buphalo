<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\Map;

use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
