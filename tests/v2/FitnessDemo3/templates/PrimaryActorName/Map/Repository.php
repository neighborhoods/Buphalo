<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Map;

use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName;
use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\MapInterface;

class Repository implements RepositoryInterface
{
    use PrimaryActorName\Map\Builder\Factory\AwareTrait;

    protected $connection;

    public function createBuilder() : BuilderInterface
    {
        return $this->getNamespacedPrimaryActorNameMapBuilderFactory()->create();
    }

    public function getAll() : MapInterface
    {
        $mapBuilder = $this->getNamespacedPrimaryActorNameMapBuilderFactory()->create();
        $mapBuilder->setRecords($this->fetch());
        return $mapBuilder->build();
    }

    private function fetch() : array
    {

    }
}
