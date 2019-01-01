<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\Actor;

use Neighborhoods\Bradfab\FabricationFile\ActorInterface;
use Neighborhoods\Bradfab\AnnotationProcessor;

class Builder implements BuilderInterface
{
    use AnnotationProcessor\Map\Builder\Factory\AwareTrait;
    use Factory\AwareTrait;

    protected $record;

    public function build(): ActorInterface
    {
        $record = $this->getRecord();
        $actor = $this->getFabricationFileActorFactory()->create();
        $templateFileExtension = sprintf(
            '.%s',
            pathinfo($record[Map\BuilderInterface::RELATIVE_TEMPLATE_PATH], PATHINFO_EXTENSION)
        );
        $intermediary = str_replace(
            $templateFileExtension,
            '',
            $record[Map\BuilderInterface::RELATIVE_TEMPLATE_PATH]
        );
        $relativeTemplatePath = str_replace(
            '\\',
            '/',
            $intermediary
        );
        $actor->setRelativeTemplatePath($relativeTemplatePath);
        $actor->setTemplateFileExtension($templateFileExtension);
        if (isset($record['annotation_processors'])) {
            $annotationProcessorMapBuilder = $this->getAnnotationProcessorMapBuilderFactory()->create();
            $annotationProcessorMapBuilder->setRecords($record['annotation_processors']);
            $annotationProcessorMap = $annotationProcessorMapBuilder->build();
            $actor->setAnnotationProcessorMap($annotationProcessorMap);
        }

        return $actor;
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
