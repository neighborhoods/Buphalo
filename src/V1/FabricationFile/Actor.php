<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile;

use LogicException;
use Neighborhoods\Buphalo\V1\AnnotationProcessor;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection */
class Actor implements ActorInterface
{
    use AnnotationProcessor\Map\AwareTrait {
        getAnnotationProcessorMap as public;
        hasAnnotationProcessorMap as public;
    }

    protected $RelativeDirectoryPath;
    protected $RelativeFilePath;
    protected $FileName;
    protected $FileExtension;
    protected $TemplateRelativeDirectoryPath;
    protected $TemplateFileName;
    protected $TemplateFileExtension;
    protected $TemplateRelativeFilePath;
    protected $PreferredTemplateTrees;

    public function getRelativeDirectoryPath(): string
    {
        if ($this->RelativeDirectoryPath === null) {
            throw new LogicException('Actor Relative Directory Path has not been set.');
        }

        return $this->RelativeDirectoryPath;
    }

    public function setRelativeDirectoryPath(string $RelativeDirectoryPath): ActorInterface
    {
        if ($this->RelativeDirectoryPath !== null) {
            throw new LogicException('Actor Relative Directory Path is already set.');
        }

        $this->RelativeDirectoryPath = $RelativeDirectoryPath;

        return $this;
    }

    public function getFileExtension(): string
    {
        if ($this->FileExtension === null) {
            throw new LogicException('Actor File Extension has not been set.');
        }

        return $this->FileExtension;
    }

    public function setFileExtension(string $FileExtension): ActorInterface
    {
        if ($this->FileExtension !== null) {
            throw new LogicException('Actor File Extension is already set.');
        }

        $this->FileExtension = $FileExtension;

        return $this;
    }

    public function getTemplateFileExtension(): string
    {
        if ($this->TemplateFileExtension === null) {
            throw new LogicException('Actor Template File Extension has not been set.');
        }

        return $this->TemplateFileExtension;
    }

    public function setTemplateFileExtension(string $TemplateFileExtension): ActorInterface
    {
        if ($this->TemplateFileExtension !== null) {
            throw new LogicException('Actor Template File Extension is already set.');
        }

        $this->TemplateFileExtension = $TemplateFileExtension;

        return $this;
    }

    public function getTemplateRelativeDirectoryPath(): string
    {
        if ($this->TemplateRelativeDirectoryPath === null) {
            throw new LogicException('Actor Template Relative Directory Path has not been set.');
        }

        return $this->TemplateRelativeDirectoryPath;
    }

    public function setTemplateRelativeDirectoryPath(string $TemplateRelativeDirectoryPath): ActorInterface
    {
        if ($this->TemplateRelativeDirectoryPath !== null) {
            throw new LogicException('Actor Template Relative Directory Path is already set.');
        }

        $this->TemplateRelativeDirectoryPath = $TemplateRelativeDirectoryPath;

        return $this;
    }

    public function getFileName(): string
    {
        if ($this->FileName === null) {
            throw new LogicException('File Name has not been set.');
        }

        return $this->FileName;
    }

    public function setFileName(string $FileName): ActorInterface
    {
        if ($this->FileName !== null) {
            throw new LogicException('File Name is already set.');
        }

        $this->FileName = $FileName;

        return $this;
    }

    public function getTemplateFileName(): string
    {
        if ($this->TemplateFileName === null) {
            throw new LogicException('Template File Name has not been set.');
        }

        return $this->TemplateFileName;
    }

    public function setTemplateFileName(string $TemplateFileName): ActorInterface
    {
        if ($this->TemplateFileName !== null) {
            throw new LogicException('Template File Name is already set.');
        }

        $this->TemplateFileName = $TemplateFileName;

        return $this;
    }

    public function getTemplateRelativeFilePath(): string
    {
        if ($this->TemplateRelativeFilePath === null) {
            throw new LogicException('Template Relative File Path has not been set.');
        }

        return $this->TemplateRelativeFilePath;
    }

    public function setTemplateRelativeFilePath(string $TemplateRelativeFilePath): ActorInterface
    {
        if ($this->TemplateRelativeFilePath !== null) {
            throw new LogicException('Template Relative File Path is already set.');
        }

        $this->TemplateRelativeFilePath = $TemplateRelativeFilePath;

        return $this;
    }

    public function getPreferredTemplateTrees(): iterable
    {
        if ($this->PreferredTemplateTrees === null) {
            throw new \LogicException('Actor PreferredTemplateTrees has not been set.');
        }

        return $this->PreferredTemplateTrees;
    }

    public function hasPreferredTemplateTrees(): bool
    {
        return $this->PreferredTemplateTrees !== null;
    }

    public function setPreferredTemplateTrees(string ...$PreferredTemplateTrees): ActorInterface
    {
        if ($this->PreferredTemplateTrees !== null) {
            throw new \LogicException('Actor PreferredTemplateTrees is already set.');
        }

        $this->PreferredTemplateTrees = $PreferredTemplateTrees;

        return $this;
    }

    public function getRelativeFilePath(): string
    {
        if ($this->RelativeFilePath === null) {
            throw new LogicException('Relative File Path has not been set.');
        }

        return $this->RelativeFilePath;
    }

    public function setRelativeFilePath(string $RelativeFilePath): ActorInterface
    {
        if ($this->RelativeFilePath !== null) {
            throw new LogicException('Relative File Path is already set.');
        }

        $this->RelativeFilePath = $RelativeFilePath;

        return $this;
    }
}
