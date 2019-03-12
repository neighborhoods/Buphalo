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
        $looksLikeTemplateFileExtension = $this->getTemplateFileExtension(
            $record[BuilderInterface::RELATIVE_TEMPLATE_PATH]
        );
        $looksLikeRelativeTemplatePath = $this->getRelativeTemplatePath(
            $looksLikeTemplateFileExtension,
            $record[BuilderInterface::RELATIVE_TEMPLATE_PATH]
        );
        $actor->setRelativeTemplatePath($looksLikeRelativeTemplatePath);
        $actor->setTemplateFileExtension($looksLikeTemplateFileExtension);
        if (isset($record[BuilderInterface::LOOKS_LIKE])) {
            $looksLikeTemplateFileExtension = $this->getTemplateFileExtension($record[BuilderInterface::LOOKS_LIKE]);
            $looksLikeRelativeTemplatePath = $this->getRelativeTemplatePath(
                $looksLikeTemplateFileExtension,
                $record[BuilderInterface::LOOKS_LIKE]
            );
            $actor->setLooksLikeRelativeTemplatePath($looksLikeRelativeTemplatePath);
            $actor->setLooksLikeTemplateFileExtension($looksLikeTemplateFileExtension);
        }
        if (isset($record[BuilderInterface::ANNOTATION_PROCESSORS])) {
            $annotationProcessorMapBuilder = $this->getAnnotationProcessorMapBuilderFactory()->create();
            $annotationProcessorMapBuilder->setRecords($record[BuilderInterface::ANNOTATION_PROCESSORS]);
            $annotationProcessorMap = $annotationProcessorMapBuilder->build();
            $actor->setAnnotationProcessorMap($annotationProcessorMap);
        }

        return $actor;
    }

    protected function getTemplateFileExtension(string $relativeTemplatePath): string
    {
        $templateFileExtension = sprintf(
            '.%s',
            pathinfo($relativeTemplatePath, PATHINFO_EXTENSION)
        );

        return $templateFileExtension;
    }

    protected function getRelativeTemplatePath(string $templateFileExtension, string $relativeTemplatePath): string
    {
        $intermediary = str_replace(
            $templateFileExtension,
            '',
            $relativeTemplatePath
        );
        $relativeTemplatePath = str_replace(
            '\\',
            '/',
            $intermediary
        );

        return $relativeTemplatePath;
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
