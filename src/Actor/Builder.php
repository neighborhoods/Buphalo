<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor;

use Neighborhoods\Bradfab\ActorInterface;
use Neighborhoods\Bradfab\FabricationFile;
use Neighborhoods\Bradfab\TargetApplication;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use FabricationFile\AwareTrait;
    use FabricationFile\Actor\AwareTrait;
    use TargetApplication\Repository\AwareTrait;

    protected $NamespacePrefix;
    protected $NamespaceRelative;
    protected $RelativeClassPath;
    protected $ParentRelativeClassPath;
    protected $PrimaryActorFullPascalCaseName;
    protected $PrimaryActorShortPascalCaseName;
    protected $FullPascalCaseName;
    protected $ShortPascalCaseName;
    protected $SourceDirectoryPath;
    protected $SourceFilePath;
    protected $FabricationDirectoryPath;
    protected $FabricationFilePath;
    protected $FileName;
    protected $FileExtension;

    public function build(): ActorInterface
    {
        $actor = $this->getActorFactory()->create();
        $actor->setNamespacePrefix($this->getNamespace());
        $actor->setNamespaceRelative($this->getNamespaceRelative());
        $actor->setRelativeClassPath($this->getRelativeClassPath());
        $actor->setParentRelativeClassPath($this->getParentRelativeClassPath());
        $actor->setPrimaryActorFullPascalCaseName($this->getPrimaryActorFullPascalCaseName());
        $actor->setPrimaryActorShortPascalCaseName($this->getPrimaryActorShortPascalCaseName());
        $actor->setFullPascalCaseName($this->getFullPascalCaseName());
        $actor->setShortPascalCaseName($this->getShortPascalCaseName());
        $actor->setSourceDirectoryPath($this->getSourceDirectoryPath());
        $actor->setSourceFilePath($this->getSourceFilePath());
        $actor->setFabricationDirectoryPath($this->getFabricationDirectoryPath());
        $actor->setFabricationFilePath($this->getFabricationFilePath());
        $actor->setFileName($this->getFileName());
        $actor->setFileExtension($this->getFileExtension());

        return $actor;
    }

    protected function getParentRelativeClassPath(): string
    {
        if ($this->ParentRelativeClassPath === null) {
            $this->ParentRelativeClassPath = str_replace(
                '/',
                '\\',
                $this->getFabricationFileActor()->getGenerateRelativeDirectoryPath()
            );
        }

        return $this->ParentRelativeClassPath;
    }

    protected function getNamespace(): string
    {
        if ($this->NamespacePrefix === null) {
            $namespace = rtrim($this->getTargetApplicationRepository()->get()->getNamespace(), '\\');
            $this->NamespacePrefix = $namespace;
        }

        return $this->NamespacePrefix;
    }

    protected function getFullPascalCaseName(): string
    {
        if ($this->FullPascalCaseName === null) {
            $relativeClassPath = $this->getParentRelativeClassPath();
            $fullPascalCaseName = sprintf(
                '%s%s',
                str_replace('\\', '', $relativeClassPath),
                $this->getFabricationFileActor()->getGenerateFileName()
            );
            $this->FullPascalCaseName = $fullPascalCaseName;
        }

        return $this->FullPascalCaseName;
    }

    protected function getShortPascalCaseName(): string
    {
        if ($this->ShortPascalCaseName === null) {
            $this->ShortPascalCaseName = $this->getFabricationFileActor()->getGenerateFileName();
        }

        return $this->ShortPascalCaseName;
    }

    protected function getSourceDirectoryPath(): string
    {
        if ($this->SourceDirectoryPath === null) {
            if ($this->getFabricationFileActor()->getGenerateRelativeDirectoryPath() !== '') {
                $this->SourceDirectoryPath = sprintf(
                    '%s/%s',
                    $this->getFabricationFile()->getDirectoryPath(),
                    $this->getFabricationFileActor()->getGenerateRelativeDirectoryPath()
                );
            } else {
                $this->SourceDirectoryPath = $this->getFabricationFile()->getDirectoryPath();
            }
        }

        return $this->SourceDirectoryPath;
    }

    protected function getFabricationDirectoryPath(): string
    {
        if ($this->FabricationDirectoryPath === null) {
            $fabricationDirectoryPath = str_replace(
                $this->getTargetApplicationRepository()->get()->getSourceDirectoryPath(),
                $this->getTargetApplicationRepository()->get()->getFabricationPath(),
                $this->getSourceDirectoryPath()
            );
            $this->FabricationDirectoryPath = $fabricationDirectoryPath;
        }

        return $this->FabricationDirectoryPath;
    }

    protected function getRelativeClassPath(): string
    {
        if ($this->RelativeClassPath === null) {
            if ($this->getParentRelativeClassPath() !== '') {
                $this->RelativeClassPath = sprintf(
                    '%s\%s',
                    $this->getParentRelativeClassPath(),
                    $this->getShortPascalCaseName()
                );
            } else {
                $this->RelativeClassPath = $this->getShortPascalCaseName();
            }
        }

        return $this->RelativeClassPath;
    }

    protected function getSourceFilePath()
    {
        if ($this->SourceFilePath === null) {
            $this->SourceFilePath = sprintf(
                '%s/%s.%s',
                $this->getSourceDirectoryPath(),
                $this->getFabricationFileActor()->getGenerateFileName(),
                $this->getFabricationFileActor()->getGenerateFileExtension()
            );
        }

        return $this->SourceFilePath;
    }

    protected function getFabricationFilePath()
    {
        if ($this->FabricationFilePath === null) {
            $this->FabricationFilePath = str_replace(
                $this->getSourceDirectoryPath(),
                $this->getFabricationDirectoryPath(),
                $this->getSourceFilePath()
            );
        }

        return $this->FabricationFilePath;
    }

    protected function getFileName(): string
    {
        if ($this->FileName === null) {
            $this->FileName = $this->getFabricationFileActor()->getGenerateFileName();
        }

        return $this->FileName;
    }

    protected function getFileExtension(): string
    {
        if ($this->FileExtension === null) {
            $this->FileExtension = $this->getFabricationFileActor()->getGenerateFileExtension();
        }

        return $this->FileExtension;
    }

    protected function getNamespaceRelative(): string
    {
        if ($this->NamespaceRelative === null) {
            $this->NamespaceRelative = str_replace(
                '/',
                '\\',
                $this->getFabricationFile()->getRelativeDirectoryPath()
            );
        }

        return $this->NamespaceRelative;
    }

    protected function getPrimaryActorFullPascalCaseName()
    {
        if ($this->PrimaryActorFullPascalCaseName === null) {
            $this->PrimaryActorFullPascalCaseName = str_replace(
                '/',
                '',
                sprintf(
                    '%s%s',
                    $this->getFabricationFile()->getRelativeDirectoryPath(),
                    $this->getPrimaryActorShortPascalCaseName()
                )
            );
        }

        return $this->PrimaryActorFullPascalCaseName;
    }

    public function getPrimaryActorShortPascalCaseName(): string
    {
        if ($this->PrimaryActorShortPascalCaseName === null) {
            $this->PrimaryActorShortPascalCaseName = $this->getFabricationFile()->getFileName();
        }

        return $this->PrimaryActorShortPascalCaseName;
    }
}
