<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

use LogicException;
use Neighborhoods\Bradfab\FabricationFile\Actor;
use Neighborhoods\Bradfab\FabricationFile\SupportingActor;

class FabricationFile implements FabricationFileInterface
{
    protected $BaseName;
    protected $FileName;
    protected $FilePath;
    protected $RelativeFilePath;
    protected $RelativeDirectoryPath;
    protected $DirectoryPath;
    protected $Actors;
    protected $SupportingActors;

    public function getActors(): Actor\MapInterface
    {
        if ($this->Actors === null) {
            throw new LogicException('FabricationFile Actors has not been set.');
        }

        return $this->Actors;
    }

    public function setActors(Actor\MapInterface $Actors): FabricationFileInterface
    {
        if ($this->Actors !== null) {
            throw new LogicException('FabricationFile Actors is already set.');
        }

        $this->Actors = $Actors;

        return $this;
    }

    public function getFileName(): string
    {
        if ($this->FileName === null) {
            throw new LogicException('FabricationFile FileName has not been set.');
        }

        return $this->FileName;
    }

    public function setFileName(string $FileName): FabricationFileInterface
    {
        if ($this->FileName !== null) {
            throw new LogicException('FabricationFile FileName is already set.');
        }

        $this->FileName = $FileName;

        return $this;
    }

    public function getFilePath(): string
    {
        if ($this->FilePath === null) {
            throw new LogicException('FabricationFile FilePath has not been set.');
        }

        return $this->FilePath;
    }

    public function setFilePath(string $FilePath): FabricationFileInterface
    {
        if ($this->FilePath !== null) {
            throw new LogicException('FabricationFile FilePath is already set.');
        }

        $this->FilePath = $FilePath;

        return $this;
    }

    public function getRelativeFilePath(): string
    {
        if ($this->RelativeFilePath === null) {
            throw new LogicException('FabricationFile RelativeFilePath has not been set.');
        }

        return $this->RelativeFilePath;
    }

    public function setRelativeFilePath(string $RelativeFilePath): FabricationFileInterface
    {
        if ($this->RelativeFilePath !== null) {
            throw new LogicException('FabricationFile RelativeFilePath is already set.');
        }

        $this->RelativeFilePath = $RelativeFilePath;

        return $this;
    }

    public function getRelativeDirectoryPath(): string
    {
        if ($this->RelativeDirectoryPath === null) {
            throw new LogicException('FabricationFile RelativeDirectoryPath has not been set.');
        }

        return $this->RelativeDirectoryPath;
    }

    public function setRelativeDirectoryPath(string $RelativeDirectoryPath): FabricationFileInterface
    {
        if ($this->RelativeDirectoryPath !== null) {
            throw new LogicException('FabricationFile RelativeDirectoryPath is already set.');
        }

        $this->RelativeDirectoryPath = $RelativeDirectoryPath;

        return $this;
    }

    public function getSupportingActors(): SupportingActor\MapInterface
    {
        if ($this->SupportingActors === null) {
            throw new LogicException('FabricationFile SupportingActors has not been set.');
        }

        return $this->SupportingActors;
    }

    public function setSupportingActors(SupportingActor\MapInterface $SupportingActors): FabricationFileInterface
    {
        if ($this->SupportingActors !== null) {
            throw new LogicException('FabricationFile SupportingActors is already set.');
        }

        $this->SupportingActors = $SupportingActors;

        return $this;
    }

    public function getBaseName(): string
    {
        if ($this->BaseName === null) {
            throw new LogicException('Base Name has not been set.');
        }

        return $this->BaseName;
    }

    public function setBaseName(string $BaseName): FabricationFileInterface
    {
        if ($this->BaseName !== null) {
            throw new LogicException('Base Name is already set.');
        }

        $this->BaseName = $BaseName;

        return $this;
    }

    public function getDirectoryPath(): string
    {
        if ($this->DirectoryPath === null) {
            throw new LogicException('Directory Path has not been set.');
        }

        return $this->DirectoryPath;
    }

    public function setDirectoryPath(string $DirectoryPath): FabricationFileInterface
    {
        if ($this->DirectoryPath !== null) {
            throw new LogicException('Directory Path is already set.');
        }

        $this->DirectoryPath = $DirectoryPath;

        return $this;
    }
}
