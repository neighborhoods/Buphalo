<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\Map;

use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor;
use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\MapInterface;

class Repository implements RepositoryInterface
{
    use Neighbor\Map\Builder\Factory\AwareTrait;

    protected $connection;

    public function createBuilder() : BuilderInterface
    {
        return $this->getDORVersionNeighborMapBuilderFactory()->create();
    }

    public function getAll() : MapInterface
    {
        $mapBuilder = $this->getDORVersionNeighborMapBuilderFactory()->create();
        $mapBuilder->setRecords($this->fetch());
        return $mapBuilder->build();
    }

    private function fetch() : array
    {

    }
}
