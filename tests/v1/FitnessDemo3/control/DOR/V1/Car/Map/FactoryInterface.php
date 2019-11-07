<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\Map;

use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
