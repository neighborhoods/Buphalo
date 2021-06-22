<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\Map;

use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\MapInterface;

class Repository implements RepositoryInterface
{
    use Neighbor\Map\Builder\Factory\AwareTrait;

    protected $connection;

    public function createBuilder() : BuilderInterface
    {
        return $this->getDORV1NeighborMapBuilderFactory()->create();
    }

    public function getAll() : MapInterface
    {
        $mapBuilder = $this->getDORV1NeighborMapBuilderFactory()->create();
        $mapBuilder->setRecords($this->fetch());
        return $mapBuilder->build();
    }

    private function fetch() : array
    {

    }
}
