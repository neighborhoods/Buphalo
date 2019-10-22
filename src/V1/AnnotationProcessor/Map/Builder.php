<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\AnnotationProcessor\Map;

use LogicException;
use Neighborhoods\Buphalo\V1\AnnotationProcessor;
use Neighborhoods\Buphalo\V1\AnnotationProcessor\MapInterface;
use Neighborhoods\Buphalo\V1\FabricationFile;

class Builder implements BuilderInterface
{
    use FabricationFile\AwareTrait;
    use Factory\AwareTrait;
    use AnnotationProcessor\Builder\Factory\AwareTrait;

    protected $records;

    public function build(): MapInterface
    {
        $records = $this->getRecords();
        $map = $this->getAnnotationProcessorMapFactory()->create();
        foreach ($records as $annotationProcessorKey => $annotationProcessorDefinition) {
            $annotationProcessorBuilder = $this->getAnnotationProcessorBuilderFactory()->create();
            $annotationProcessorBuilder->setFabricationFile($this->getFabricationFile());
            $annotationProcessorBuilder->setRecord($annotationProcessorDefinition);
            $map[$annotationProcessorKey] = $annotationProcessorBuilder->build();
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
