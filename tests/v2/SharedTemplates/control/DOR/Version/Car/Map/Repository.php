<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\Map;

use Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car;
use Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\MapInterface;

class Repository implements RepositoryInterface
{
    use Car\Map\Builder\Factory\AwareTrait;

    protected $connection;

    public function createBuilder() : BuilderInterface
    {
        return $this->getDORVersionCarMapBuilderFactory()->create();
    }

    public function getAll() : MapInterface
    {
        $mapBuilder = $this->getDORVersionCarMapBuilderFactory()->create();
        $mapBuilder->setRecords($this->fetch());
        return $mapBuilder->build();
    }

    private function fetch() : array
    {

    }
}
