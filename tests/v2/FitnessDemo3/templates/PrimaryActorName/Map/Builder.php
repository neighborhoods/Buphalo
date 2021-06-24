<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\PrimaryActorName\Map;

use LogicException;
use Neighborhoods\BuphaloTemplateTree\PrimaryActorName\MapInterface;
use Neighborhoods\BuphaloTemplateTree\PrimaryActorName;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use PrimaryActorName\Builder\Factory\AwareTrait;

    protected $records;

    public function build(): MapInterface
    {
        $map = $this->getPrimaryActorNameMapFactory()->create();

        foreach($this->getRecords() as $record) {
            $builder = $this->getPrimaryActorNameBuilderFactory()->create();
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
