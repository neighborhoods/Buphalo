<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

use LogicException;

class Actor implements ActorInterface
{
    protected $Namespace;
    protected $RelativeClassPath;
    protected $ParentRelativeClassPath;
    protected $FullPascalCaseName;
    protected $ShortPascalCaseName;
    protected $SourceDirectoryPath;
    protected $SourceFilePath;
    protected $FabricationDirectoryPath;
    protected $FabricationFilePath;
    protected $FileName;
    protected $FileExtension;

    public function getParentRelativeClassPath(): string
    {
        if ($this->ParentRelativeClassPath === null) {
            throw new LogicException('Parent Relative Class Path has not been set.');
        }

        return $this->ParentRelativeClassPath;
    }

    public function setParentRelativeClassPath(string $ParentRelativeClassPath): ActorInterface
    {
        if ($this->ParentRelativeClassPath !== null) {
            throw new LogicException('Parent Relative Class Path is already set.');
        }

        $this->ParentRelativeClassPath = $ParentRelativeClassPath;

        return $this;
    }

    public function getNamespace(): string
    {
        if ($this->Namespace === null) {
            throw new LogicException('Namespace has not been set.');
        }

        return $this->Namespace;
    }

    public function setNamespace(string $Namespace): ActorInterface
    {
        if ($this->Namespace !== null) {
            throw new LogicException('Namespace is already set.');
        }

        $this->Namespace = $Namespace;

        return $this;
    }

    public function getFullPascalCaseName(): string
    {
        if ($this->FullPascalCaseName === null) {
            throw new LogicException('Full Pascal Case Name has not been set.');
        }

        return $this->FullPascalCaseName;
    }

    public function setFullPascalCaseName(string $FullPascalCaseName): ActorInterface
    {
        if ($this->FullPascalCaseName !== null) {
            throw new LogicException('Full Pascal Case Name is already set.');
        }

        $this->FullPascalCaseName = $FullPascalCaseName;

        return $this;
    }

    public function getShortPascalCaseName(): string
    {
        if ($this->ShortPascalCaseName === null) {
            throw new LogicException('Short Pascal Case Name has not been set.');
        }

        return $this->ShortPascalCaseName;
    }

    public function setShortPascalCaseName(string $ShortPascalCaseName): ActorInterface
    {
        if ($this->ShortPascalCaseName !== null) {
            throw new LogicException('Short Pascal Case Name is already set.');
        }

        $this->ShortPascalCaseName = $ShortPascalCaseName;

        return $this;
    }

    public function getSourceDirectoryPath(): string
    {
        if ($this->SourceDirectoryPath === null) {
            throw new LogicException('Source Directory Path has not been set.');
        }

        return $this->SourceDirectoryPath;
    }

    public function setSourceDirectoryPath(string $SourceDirectoryPath): ActorInterface
    {
        if ($this->SourceDirectoryPath !== null) {
            throw new LogicException('Source Directory Path is already set.');
        }

        $this->SourceDirectoryPath = $SourceDirectoryPath;

        return $this;
    }

    public function getFabricationDirectoryPath(): string
    {
        if ($this->FabricationDirectoryPath === null) {
            throw new LogicException('Fabrication Directory Path has not been set.');
        }

        return $this->FabricationDirectoryPath;
    }

    public function setFabricationDirectoryPath(string $FabricationDirectoryPath): ActorInterface
    {
        if ($this->FabricationDirectoryPath !== null) {
            throw new LogicException('Fabrication Directory Path is already set.');
        }

        $this->FabricationDirectoryPath = $FabricationDirectoryPath;

        return $this;
    }

    public function getRelativeClassPath(): string
    {
        if ($this->RelativeClassPath === null) {
            throw new LogicException('Relative Class Path has not been set.');
        }

        return $this->RelativeClassPath;
    }

    public function setRelativeClassPath(string $RelativeClassPath): ActorInterface
    {
        if ($this->RelativeClassPath !== null) {
            throw new LogicException('Relative Class Path is already set.');
        }

        $this->RelativeClassPath = $RelativeClassPath;

        return $this;
    }

    public function getSourceFilePath(): string
    {
        if ($this->SourceFilePath === null) {
            throw new LogicException('Source File Path has not been set.');
        }

        return $this->SourceFilePath;
    }

    public function setSourceFilePath(string $SourceFilePath): ActorInterface
    {
        if ($this->SourceFilePath !== null) {
            throw new LogicException('Source File Path is already set.');
        }

        $this->SourceFilePath = $SourceFilePath;

        return $this;
    }

    public function getFabricationFilePath(): string
    {
        if ($this->FabricationFilePath === null) {
            throw new LogicException('Fabrication File Path has not been set.');
        }

        return $this->FabricationFilePath;
    }

    public function setFabricationFilePath(string $FabricationFilePath): ActorInterface
    {
        if ($this->FabricationFilePath !== null) {
            throw new LogicException('Fabrication File Path is already set.');
        }

        $this->FabricationFilePath = $FabricationFilePath;

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

    public function getFileExtension(): string
    {
        if ($this->FileExtension === null) {
            throw new LogicException('File Extension has not been set.');
        }

        return $this->FileExtension;
    }

    public function setFileExtension(string $FileExtension): ActorInterface
    {
        if ($this->FileExtension !== null) {
            throw new LogicException('File Extension is already set.');
        }

        $this->FileExtension = $FileExtension;

        return $this;
    }
}
