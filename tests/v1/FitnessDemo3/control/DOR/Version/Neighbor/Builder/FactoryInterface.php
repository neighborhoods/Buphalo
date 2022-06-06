<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\Builder;

use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
