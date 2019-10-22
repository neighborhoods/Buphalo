<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile\Actor\Map;

use LogicException;
use Neighborhoods\Buphalo\V1\FabricationFile;
use Neighborhoods\Buphalo\V1\FabricationFile\Actor;
use Neighborhoods\Buphalo\V1\FabricationFile\Actor\MapInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use FabricationFile\Actor\Builder\Factory\AwareTrait;
    use FabricationFile\AwareTrait;

    protected $records;

    public function build(): MapInterface
    {
        $map = $this->getFabricationFileActorMapFactory()->create();
        foreach ($this->getRecords()[self::ACTORS] as $relativeClassname => $actorRecord) {
            $actorBuilder = $this->getFabricationFileActorBuilderFactory()->create();
            $actorBuilder->setFabricationFile($this->getFabricationFile());
            $actorRecord[Actor\BuilderInterface::GENERATE] = $relativeClassname;
            $actor = $actorBuilder->setRecord($actorRecord)->build();
            $map[$relativeClassname] = $actor;
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
