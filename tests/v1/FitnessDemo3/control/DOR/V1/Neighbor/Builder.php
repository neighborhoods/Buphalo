<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\NeighborInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    protected $record;

    public function build(): NeighborInterface
    {
        $Neighbor = $this->getDORV1NeighborFactory()->create();

        $record = $this->getRecord();

        $Neighbor->setYear($record['year']);
        $Neighbor->setFirst($record['first']);
        $Neighbor->setLast($record['last']);

        return $Neighbor;
    }

    protected function getRecord(): array
    {
        if ($this->record === null) {
            throw new LogicException('Builder record has not been set.');
        }

        return $this->record;
    }

    public function setRecord(array $record): BuilderInterface
    {
        if ($this->record !== null) {
            throw new LogicException('Builder record is already set.');
        }

        $this->record = $record;

        return $this;
    }
}
