<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\FabricationFile\Actor;

use LogicException;
use Neighborhoods\Buphalo\V2\AnnotationProcessor;
use Neighborhoods\Buphalo\V2\FabricationFile;
use Neighborhoods\Buphalo\V2\FabricationFile\ActorInterface;
use function strlen;

class Builder implements BuilderInterface
{
    use FabricationFile\AwareTrait;
    use AnnotationProcessor\Map\Builder\Factory\AwareTrait;
    use Factory\AwareTrait;

    protected const CURRENT_DIRECTORY = '.';

    protected $Record;
    protected $TemplateRelativeDirectoryPath;
    protected $TemplateBaseName;
    protected $TemplateFileName;
    protected $TemplateFileExtension;
    protected $TemplateRelativeFilePath;
    protected $GenerateRelativeDirectoryPath;
    protected $RelativeFilePath;
    protected $BaseName;
    protected $FileName;
    protected $FileExtension;

    public function build(): ActorInterface
    {
        $this->getFileName();
        $record = $this->getRecord();
        $actor = $this->getFabricationFileActorFactory()->create();
        $actor->setRelativeDirectoryPath($this->getRelativeDirectoryPath());
        $actor->setFileName($this->getFileName());
        $actor->setFileExtension($this->getFileExtension());
        $actor->setRelativeFilePath($this->getRelativeFilePath());
        $actor->setTemplateRelativeDirectoryPath($this->getTemplateRelativeDirectoryPath());
        $actor->setTemplateFileName($this->getTemplateFileName());
        $actor->setTemplateFileExtension($this->getTemplateFileExtension());
        $actor->setTemplateRelativeFilePath($this->getTemplateRelativeFilePath());

        if (isset($record[BuilderInterface::ANNOTATION_PROCESSORS])) {
            $annotationProcessorMapBuilder = $this->getAnnotationProcessorMapBuilderFactory()->create();
            $annotationProcessorMapBuilder->setRecords($record[BuilderInterface::ANNOTATION_PROCESSORS]);
            $annotationProcessorMapBuilder->setFabricationFile($this->getFabricationFile());
            $annotationProcessorMap = $annotationProcessorMapBuilder->build();
            $actor->setAnnotationProcessorMap($annotationProcessorMap);
        }

        if (isset($record[BuilderInterface::PREFERRED_TEMPLATE_TREES])) {
            $actor->setPreferredTemplateTrees(...$record[BuilderInterface::PREFERRED_TEMPLATE_TREES]);
        }

        return $actor;
    }

    protected function getFileName(): string
    {
        if ($this->FileName === null) {
            $this->FileName = substr(
                $this->getBaseName(),
                0,
                strpos($this->getBaseName(), '.')
            );
        }

        return $this->FileName;
    }

    protected function getBaseName(): string
    {
        if ($this->BaseName === null) {
            $generatedBaseName = pathinfo($this->getRecord()[BuilderInterface::GENERATE], PATHINFO_BASENAME);
            $this->BaseName = str_replace(
                BuilderInterface::ACTOR_NAME,
                $this->getFabricationFile()->getFileName(),
                $generatedBaseName
            );
        }

        return $this->BaseName;
    }


    protected function getFileExtension(): string
    {
        if ($this->FileExtension === null) {
            $this->FileExtension = substr(
                $this->getBaseName(),
                strpos($this->getBaseName(), '.') + 1,
                strlen($this->getBaseName())
            );
        }

        return $this->FileExtension;
    }

    protected function getRelativeDirectoryPath(): string
    {
        if ($this->GenerateRelativeDirectoryPath === null) {
            $relativeGeneratedDirectoryPath = pathinfo(
                str_replace(
                    BuilderInterface::ACTOR_NAME,
                    $this->getFabricationFile()->getFileName(),
                    $this->getRecord()[BuilderInterface::GENERATE]
                ),
                PATHINFO_DIRNAME
            );
            if ($relativeGeneratedDirectoryPath === self::CURRENT_DIRECTORY) {
                $this->GenerateRelativeDirectoryPath = '';
            } else {
                $this->GenerateRelativeDirectoryPath = $relativeGeneratedDirectoryPath;
            }
        }

        return $this->GenerateRelativeDirectoryPath;
    }

    protected function getRelativeFilePath(): string
    {
        if ($this->RelativeFilePath === null) {
            $this->RelativeFilePath = sprintf(
                '%s/%s.%s',
                $this->getRelativeDirectoryPath(),
                $this->getFileName(),
                $this->getFileExtension()
            );
        }

        return $this->RelativeFilePath;
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

    protected function getTemplateRelativeDirectoryPath(): string
    {
        if ($this->TemplateRelativeDirectoryPath === null) {
            $relativeTemplateDirectoryPath = pathinfo(
                $this->getRecord()[BuilderInterface::TEMPLATE],
                PATHINFO_DIRNAME
            );
            if ($relativeTemplateDirectoryPath === self::CURRENT_DIRECTORY) {
                $this->TemplateRelativeDirectoryPath = '';
            } else {
                $this->TemplateRelativeDirectoryPath = $relativeTemplateDirectoryPath;
            }
        }

        return $this->TemplateRelativeDirectoryPath;
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

    protected function getTemplateRelativeFilePath(): string
    {
        if ($this->TemplateRelativeFilePath === null) {
            $this->TemplateRelativeFilePath = sprintf(
                '%s/%s.%s',
                $this->getTemplateRelativeDirectoryPath(),
                $this->getTemplateFileName(),
                $this->getTemplateFileExtension()
            );
        }

        return $this->TemplateRelativeFilePath;
    }
}
