<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Car\Map;

use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Car\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
