<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\SupportingActor;

use Neighborhoods\Bradfab\FabricationFile\SupportingActorInterface;
use Neighborhoods\Bradfab\AnnotationProcessor;

class Builder implements BuilderInterface
{
    use AnnotationProcessor\Map\Builder\Factory\AwareTrait;
    use Factory\AwareTrait;

    protected $record;

    public function build(): SupportingActorInterface
    {
        $record = $this->getRecord();
        $supportingActor = $this->getFabricationFileSupportingActorFactory()->create();
        $templateFileExtension = sprintf(
            '.%s',
            pathinfo($record[Map\BuilderInterface::RELATIVE_TEMPLATE_PATH], PATHINFO_EXTENSION)
        );
        $relativeTemplatePath = str_replace(
            $templateFileExtension,
            '',
            $record[Map\BuilderInterface::RELATIVE_TEMPLATE_PATH]
        );
        $supportingActor->setRelativeTemplatePath($relativeTemplatePath);
        $supportingActor->setTemplateFileExtension($templateFileExtension);
        if (isset($record['annotation_processors']) && is_array($record['annotation_processors'])) {
            $annotationProcessorMapBuilder = $this->getAnnotationProcessorMapBuilderFactory()->create();
            $annotationProcessorMapBuilder->setRecords($record['annotation_processors']);
            $annotationProcessorMap = $annotationProcessorMapBuilder->build();
            $supportingActor->setAnnotationProcessorMap($annotationProcessorMap);
        }

        return $supportingActor;
    }

    protected function getRecord(): array
    {
        if ($this->record === null) {
            throw new \LogicException('Builder record has not been set.');
        }

        return $this->record;
    }

    public function setRecord(array $record): BuilderInterface
    {
        if ($this->record !== null) {
            throw new \LogicException('Builder record is already set.');
        }

        $this->record = $record;

        return $this;
    }
}
