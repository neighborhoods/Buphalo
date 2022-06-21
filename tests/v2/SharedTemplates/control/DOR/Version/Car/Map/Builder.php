<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\Map;

use LogicException;
use Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\MapInterface;
use Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use Car\Builder\Factory\AwareTrait;

    protected $records;

    public function build(): MapInterface
    {
        $map = $this->getDORVersionCarMapFactory()->create();

        foreach($this->getRecords() as $record) {
            $builder = $this->getDORVersionCarBuilderFactory()->create();
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
