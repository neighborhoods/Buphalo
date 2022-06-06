<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor;

use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\NeighborInterface;

interface BuilderInterface
{
    public function build(): NeighborInterface;

    public function setRecord(array $record): BuilderInterface;
}
