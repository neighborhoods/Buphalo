<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\Map;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\MapInterface;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use Car\Builder\Factory\AwareTrait;

    protected $records;

    public function build(): MapInterface
    {
        $map = $this->getDORV1CarMapFactory()->create();

        foreach($this->getRecords() as $record) {
            $builder = $this->getDORV1CarBuilderFactory()->create();
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
