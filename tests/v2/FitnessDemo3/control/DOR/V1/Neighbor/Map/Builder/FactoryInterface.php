<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\Map\Builder;

use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\Map\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
