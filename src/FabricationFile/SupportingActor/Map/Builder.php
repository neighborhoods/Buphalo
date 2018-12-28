<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\SupportingActor\Map;

use Neighborhoods\Bradfab\FabricationFile\SupportingActor\MapInterface;
use Neighborhoods\Bradfab\FabricationFile;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use FabricationFile\SupportingActor\Builder\Factory\AwareTrait;

    protected $records;

    public function build(): MapInterface
    {
        $map = $this->getFabricationFileSupportingActorMapFactory()->create();
        foreach ($this->getRecords()[self::SUPPORTING_ACTORS] as $relativeClassname => $supportingActorRecord) {
            $supportingActorBuilder = $this->getFabricationFileSupportingActorBuilderFactory()->create();
            $supportingActorRecord[self::RELATIVE_TEMPLATE_PATH] = $relativeClassname;
            $supportingActor = $supportingActorBuilder->setRecord($supportingActorRecord)->build();
            $map[$relativeClassname] = $supportingActor;
        }

        return $map;
    }

    protected function getRecords(): array
    {
        if ($this->records === null) {
            throw new \LogicException('Builder records has not been set.');
        }

        return $this->records;
    }

    public function setRecords(array $records): BuilderInterface
    {
        if ($this->records !== null) {
            throw new \LogicException('Builder records is already set.');
        }

        $this->records = $records;

        return $this;
    }
}
