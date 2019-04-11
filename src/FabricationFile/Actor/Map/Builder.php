<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\Actor\Map;

use LogicException;
use Neighborhoods\Bradfab\FabricationFile\Actor;
use Neighborhoods\Bradfab\FabricationFile\Actor\MapInterface;
use Neighborhoods\Bradfab\FabricationFile;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use FabricationFile\Actor\Builder\Factory\AwareTrait;

    protected $records;

    public function build(): MapInterface
    {
        $map = $this->getFabricationFileActorMapFactory()->create();
        foreach ($this->getRecords()[self::SUPPORTING_ACTORS] as $relativeClassname => $actorRecord) {
            $actorBuilder = $this->getFabricationFileActorBuilderFactory()->create();
            $actorRecord[Actor\BuilderInterface::RELATIVE_TEMPLATE_PATH] = $relativeClassname;
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
