<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\Map;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\MapInterface;
use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use Neighbor\Builder\Factory\AwareTrait;

    protected $records;

    public function build(): MapInterface
    {
        $map = $this->getDORVersionNeighborMapFactory()->create();

        foreach($this->getRecords() as $record) {
            $builder = $this->getDORVersionNeighborBuilderFactory()->create();
            $map[] = $builder->setRecord($record)->build();
        }

        return $map;
    }

    protected function getRecords(): array
    {
        if ($this->records === null) {
            throw new LogicException('Builder records has not been set.');
        }

        return $this->records;
    }

    public function setRecords(array $records): BuilderInterface
    {
        if ($this->records !== null) {
            throw new LogicException('Builder records is already set.');
        }

        $this->records = $records;

        return $this;
    }
}
