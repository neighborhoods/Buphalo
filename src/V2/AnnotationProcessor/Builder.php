<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\AnnotationProcessor;

use LogicException;
use Neighborhoods\Buphalo\V2\AnnotationProcessor;
use Neighborhoods\Buphalo\V2\AnnotationProcessorInterface;
use Neighborhoods\Buphalo\V2\FabricationFile;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use AnnotationProcessor\Repository\AwareTrait;
    use AnnotationProcessor\Context\Builder\Factory\AwareTrait;
    use FabricationFile\AwareTrait;

    protected $record;

    public function build(): AnnotationProcessorInterface
    {
        $annotationProcessorDefinition = $this->getRecord();
        $fqcn = $annotationProcessorDefinition[BuilderInterface::PROCESSOR_FQCN];
        $annotationProcessor = $this->getAnnotationProcessorRepository()->getByFQCN($fqcn);
        $contextBuilder = $this->getAnnotationProcessorContextBuilderFactory()->create();
        $contextBuilder->setFabricationFile($this->getFabricationFile());
        if (isset($annotationProcessorDefinition[Context\BuilderInterface::STATIC_CONTEXT_RECORD])) {
            $contextBuilder->setRecord($annotationProcessorDefinition[Context\BuilderInterface::STATIC_CONTEXT_RECORD]);
        }
        $annotationProcessor->setAnnotationProcessorContext($contextBuilder->build());

        return $annotationProcessor;
    }

    protected function getRecord(): array
    {
        if ($this->record === null) {
            throw new LogicException('Builder record has not been set.');
        }

        return $this->record;
    }

    public function setRecord(array $record): BuilderInterface
    {
        if ($this->record !== null) {
            throw new LogicException('Builder record is already set.');
        }

        $this->record = $record;

        return $this;
    }
}
