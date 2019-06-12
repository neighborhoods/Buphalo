<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\Actor;

use LogicException;
use Neighborhoods\Bradfab\AnnotationProcessor;
use Neighborhoods\Bradfab\FabricationFile;
use Neighborhoods\Bradfab\FabricationFile\ActorInterface;

class Builder implements BuilderInterface
{
    use FabricationFile\AwareTrait;
    use AnnotationProcessor\Map\Builder\Factory\AwareTrait;
    use Factory\AwareTrait;

    protected const CURRENT_DIRECTORY = '.';

    protected $Record;
    protected $RelativeTemplateDirectoryPath;
    protected $TemplateBaseName;
    protected $TemplateFileName;
    protected $TemplateFileExtension;
    protected $GenerateRelativeDirectoryPath;
    protected $GenerateBaseName;
    protected $GenerateFileName;
    protected $GenerateFileExtension;

    public function build(): ActorInterface
    {
        $this->getGenerateFileName();
        $record = $this->getRecord();
        $actor = $this->getFabricationFileActorFactory()->create();
        $actor->setGenerateRelativeDirectoryPath($this->getGenerateRelativeDirectoryPath());
        $actor->setGenerateFileName($this->getGenerateFileName());
        $actor->setGenerateFileExtension($this->getGenerateFileExtension());
        $actor->setTemplateRelativeDirectoryPath($this->getRelativeTemplateDirectoryPath());
        $actor->setTemplateFileName($this->getTemplateFileName());
        $actor->setTemplateFileExtension($this->getTemplateFileExtension());
        if (isset($record[BuilderInterface::ANNOTATION_PROCESSORS])) {
            $annotationProcessorMapBuilder = $this->getAnnotationProcessorMapBuilderFactory()->create();
            $annotationProcessorMapBuilder->setRecords($record[BuilderInterface::ANNOTATION_PROCESSORS]);
            $annotationProcessorMapBuilder->setFabricationFile($this->getFabricationFile());
            $annotationProcessorMap = $annotationProcessorMapBuilder->build();
            $actor->setAnnotationProcessorMap($annotationProcessorMap);
        }

        return $actor;
    }

    protected function getGenerateFileName(): string
    {
        if ($this->GenerateFileName === null) {
            $this->GenerateFileName = substr(
                $this->getGenerateBaseName(),
                0,
                strpos($this->getGenerateBaseName(), '.')
            );
        }

        return $this->GenerateFileName;
    }

    protected function getGenerateBaseName(): string
    {
        if ($this->GenerateBaseName === null) {
            $GenerateBaseName = pathinfo($this->getRecord()[BuilderInterface::GENERATE], PATHINFO_BASENAME);
            $this->GenerateBaseName = str_replace(
                BuilderInterface::ACTOR_NAME,
                $this->getFabricationFile()->getFileName(),
                $GenerateBaseName
            );
        }

        return $this->GenerateBaseName;
    }


    protected function getGenerateFileExtension(): string
    {
        if ($this->GenerateFileExtension === null) {
            $this->GenerateFileExtension = substr(
                $this->getGenerateBaseName(),
                strpos($this->getGenerateBaseName(), '.') + 1,
                strlen($this->getGenerateBaseName())
            );
        }

        return $this->GenerateFileExtension;
    }

    protected function getGenerateRelativeDirectoryPath(): string
    {
        if ($this->GenerateRelativeDirectoryPath === null) {
            $RelativeGeneratedDirectoryPath = pathinfo(
                str_replace(
                    BuilderInterface::ACTOR_NAME,
                    $this->getFabricationFile()->getFileName(),
                    $this->getRecord()[BuilderInterface::GENERATE]
                ),
                PATHINFO_DIRNAME
            );
            if ($RelativeGeneratedDirectoryPath === self::CURRENT_DIRECTORY) {
                $this->GenerateRelativeDirectoryPath = '';
            } else {
                $this->GenerateRelativeDirectoryPath = $RelativeGeneratedDirectoryPath;
            }
        }

        return $this->GenerateRelativeDirectoryPath;
    }

    protected function getTemplateFileName(): string
    {
        if ($this->TemplateFileName === null) {
            $this->TemplateFileName = substr(
                $this->getTemplateBaseName(),
                0,
                strpos($this->getTemplateBaseName(), '.')
            );
        }

        return $this->TemplateFileName;
    }

    protected function getTemplateBaseName(): string
    {
        if ($this->TemplateBaseName === null) {
            $this->TemplateBaseName = pathinfo(
                $this->getRecord()[BuilderInterface::TEMPLATE],
                PATHINFO_BASENAME
            );
        }

        return $this->TemplateBaseName;
    }

    protected function getTemplateFileExtension(): string
    {
        if ($this->TemplateFileExtension === null) {
            $this->TemplateFileExtension = substr(
                $this->getTemplateBaseName(),
                strpos($this->getTemplateBaseName(), '.') + 1,
                strlen($this->getTemplateBaseName())
            );
        }

        return $this->TemplateFileExtension;
    }

    protected function getRelativeTemplateDirectoryPath(): string
    {
        if ($this->RelativeTemplateDirectoryPath === null) {
            $RelativeTemplateDirectoryPath = pathinfo($this->getRecord()[BuilderInterface::TEMPLATE], PATHINFO_DIRNAME);
            if ($RelativeTemplateDirectoryPath === self::CURRENT_DIRECTORY) {
                $this->RelativeTemplateDirectoryPath = '';
            } else {
                $this->RelativeTemplateDirectoryPath = $RelativeTemplateDirectoryPath;
            }
        }

        return $this->RelativeTemplateDirectoryPath;
    }

    protected function getRecord(): array
    {
        if ($this->Record === null) {
            throw new LogicException('Builder Record has not been set.');
        }

        return $this->Record;
    }

    public function setRecord(array $record): BuilderInterface
    {
        if ($this->Record !== null) {
            throw new LogicException('Builder Record is already set.');
        }

        $this->Record = $record;

        return $this;
    }
}
