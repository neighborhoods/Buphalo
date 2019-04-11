<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\AnnotationProcessor\Map;

use LogicException;
use Neighborhoods\Bradfab\AnnotationProcessor\MapInterface;
use Neighborhoods\Bradfab\AnnotationProcessor;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use AnnotationProcessor\Builder\Factory\AwareTrait;

    protected $records;

    public function build(): MapInterface
    {
        $records = $this->getRecords();
        $map = $this->getAnnotationProcessorMapFactory()->create();
        foreach ($records as $annotationProcessorKey => $annotationProcessorDefinition) {
            $annotationProcessorBuilder = $this->getAnnotationProcessorBuilderFactory()->create();
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
