<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\PrimaryActorName\Map;

use Neighborhoods\BuphaloTemplateTree\PrimaryActorName;
use Neighborhoods\BuphaloTemplateTree\PrimaryActorName\MapInterface;

class Repository implements RepositoryInterface
{
    use PrimaryActorName\Map\Builder\Factory\AwareTrait;

    protected $connection;

    public function createBuilder() : BuilderInterface
    {
        return $this->getPrimaryActorNameMapBuilderFactory()->create();
    }

    public function getAll() : MapInterface
    {
        $mapBuilder = $this->getPrimaryActorNameMapBuilderFactory()->create();
        $mapBuilder->setRecords($this->fetch());
        return $mapBuilder->build();
    }

    private function fetch() : array
    {

    }
}
