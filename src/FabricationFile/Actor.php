<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile;

use LogicException;
use Neighborhoods\Bradfab\AnnotationProcessor;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection */
class Actor implements ActorInterface
{
    use AnnotationProcessor\Map\AwareTrait {
        getAnnotationProcessorMap as public;
        hasAnnotationProcessorMap as public;
    }

    protected $GenerateRelativeDirectoryPath;
    protected $GenerateFileName;
    protected $GenerateFileExtension;
    protected $TemplateRelativeDirectoryPath;
    protected $TemplateFileName;
    protected $TemplateFileExtension;
    protected $TemplateRelativeFilePath;

    public function getGenerateRelativeDirectoryPath(): string
    {
        if ($this->GenerateRelativeDirectoryPath === null) {
            throw new LogicException('Actor Generate Relative Directory Path has not been set.');
        }

        return $this->GenerateRelativeDirectoryPath;
    }

    public function setGenerateRelativeDirectoryPath(string $GenerateRelativeDirectoryPath): ActorInterface
    {
        if ($this->GenerateRelativeDirectoryPath !== null) {
            throw new LogicException('Actor Generate Relative Directory Path is already set.');
        }

        $this->GenerateRelativeDirectoryPath = $GenerateRelativeDirectoryPath;

        return $this;
    }

    public function getGenerateFileExtension(): string
    {
        if ($this->GenerateFileExtension === null) {
            throw new LogicException('Actor Generate File Extension has not been set.');
        }

        return $this->GenerateFileExtension;
    }

    public function setGenerateFileExtension(string $GenerateFileExtension): ActorInterface
    {
        if ($this->GenerateFileExtension !== null) {
            throw new LogicException('Actor Generated File Extension is already set.');
        }

        $this->GenerateFileExtension = $GenerateFileExtension;

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

    public function getGenerateFileName(): string
    {
        if ($this->GenerateFileName === null) {
            throw new LogicException('Generate File Name has not been set.');
        }

        return $this->GenerateFileName;
    }

    public function setGenerateFileName(string $GenerateFileName): ActorInterface
    {
        if ($this->GenerateFileName !== null) {
            throw new LogicException('Generate File Name is already set.');
        }

        $this->GenerateFileName = $GenerateFileName;

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

    public function getTemplateRelativeFilePath()
    {
        if ($this->TemplateRelativeFilePath === null) {
            throw new LogicException('Template Relative File Path has not been set.');
        }

        return $this->TemplateRelativeFilePath;
    }

    public function setTemplateRelativeFilePath($TemplateRelativeFilePath): ActorInterface
    {
        if ($this->TemplateRelativeFilePath !== null) {
            throw new LogicException('Template Relative File Path is already set.');
        }

        $this->TemplateRelativeFilePath = $TemplateRelativeFilePath;

        return $this;
    }
}
