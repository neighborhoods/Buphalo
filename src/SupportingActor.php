<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

use LogicException;

class SupportingActor implements SupportingActorInterface
{
    use FabricationFile\SupportingActor\AwareTrait;
    use Actor\AwareTrait;

    protected $ShortPascalCaseName;
    protected $FabricationFilePath;
    protected $RelativeFabricationFilePath;
    protected $RelativeNamePath;
    protected $RelativeClassNamePath;
    protected $FileExtension;

    public function getShortPascalCaseName(): string
    {
        if ($this->ShortPascalCaseName === null) {
            $relativeNamePath = $this->getRelativeNamePath();
            $start = 0;
            $position = strrpos($relativeNamePath, '/');
            if ($position !== false) {
                $start = $position + 1;
            }
            $shortName = trim(substr($relativeNamePath, $start));
            $this->ShortPascalCaseName = $shortName;
        }

        return $this->ShortPascalCaseName;
    }

    public function getFullPascalCaseName(): string
    {
        throw new LogicException('Unimplemented method.');
    }

    public function getFabricationFilePath(): string
    {
        if ($this->FabricationFilePath === null) {
            $fabricationDirectoryPath = $this->getActor()->getFabricationDirectoryPath();
            $fabricationFilePath = sprintf('%s/%s', $fabricationDirectoryPath, $this->getRelativeFabricationFilePath());
            $this->FabricationFilePath = $fabricationFilePath;
        }

        return $this->FabricationFilePath;
    }

    public function getSourceFilePath(): string
    {
        throw new LogicException('Get source file path is not implemented.');
    }

    protected function getRelativeFabricationFilePath(): string
    {
        if ($this->RelativeFabricationFilePath === null) {
            $relativeNamePath = $this->getRelativeNamePath();
            $relativeFabricationFilePath = sprintf(
                '%s%s',
                $relativeNamePath,
                $this->getFileExtension()
            );
            $this->RelativeFabricationFilePath = $relativeFabricationFilePath;
        }

        return $this->RelativeFabricationFilePath;
    }

    protected function getRelativeNamePath(): string
    {
        if ($this->RelativeNamePath === null) {
            $fabricationFileActor = $this->getFabricationFileSupportingActor();
            $relativeNamePath = $fabricationFileActor->getRelativeTemplatePath();
            if ($fabricationFileActor->hasAsRelativeTemplatePath()) {
                $relativeNamePath = $fabricationFileActor->getAsRelativeTemplatePath();
            }
            $this->RelativeNamePath = $relativeNamePath;
        }

        return $this->RelativeNamePath;
    }

    public function getRelativeClassPath(): string
    {
        if ($this->RelativeClassNamePath === null) {
            $relativeClassNamePath = str_replace('/', '\\', $this->getRelativeNamePath());
            $this->RelativeClassNamePath = $relativeClassNamePath;
        }

        return $this->RelativeClassNamePath;
    }

    public function getFileExtension(): string
    {
        if ($this->FileExtension === null) {
            $fileExtension = $this->getFabricationFileSupportingActor()->getTemplateFileExtension();
            if ($this->getFabricationFileSupportingActor()->hasAsTemplateFileExtension()) {
                $fileExtension = $this->getFabricationFileSupportingActor()->getAsTemplateFileExtension();
            }
            $this->FileExtension = $fileExtension;
        }

        return $this->FileExtension;
    }

    public function getParentRelativeClassPath(): string
    {
        // TODO: Implement getParentRelativeClassPath() method.
        throw new LogicException('Unimplemented [getParentRelativeClassPath] method.');
    }

    public function getNamespace(): string
    {
        // TODO: Implement getNamespace() method.
        throw new LogicException('Unimplemented [getNamespace] method.');
    }

    public function getSourceDirectoryPath(): string
    {
        // TODO: Implement getSourceDirectoryPath() method.
        throw new LogicException('Unimplemented [getSourceDirectoryPath] method.');
    }

    public function getFabricationDirectoryPath(): string
    {
        // TODO: Implement getFabricationDirectoryPath() method.
        throw new LogicException('Unimplemented [getFabricationDirectoryPath] method.');
    }

    public function setRelativeClassPath($RelativeClassPath): ActorInterface
    {
        // TODO: Implement setRelativeClassPath() method.
        throw new LogicException('Unimplemented [setRelativeClassPath] method.');
    }

    public function setFullPascalCaseName($FullPascalCaseName): ActorInterface
    {
        // TODO: Implement setFullPascalCaseName() method.
        throw new LogicException('Unimplemented [setFullPascalCaseName] method.');
    }

    public function setShortPascalCaseName($ShortPascalCaseName): ActorInterface
    {
        // TODO: Implement setShortPascalCaseName() method.
        throw new LogicException('Unimplemented [setShortPascalCaseName] method.');
    }

    public function setNamespace($Namespace): ActorInterface
    {
        // TODO: Implement setNamespace() method.
        throw new LogicException('Unimplemented [setNamespace] method.');
    }

    public function setParentRelativeClassPath($ParentRelativeClassPath): ActorInterface
    {
        // TODO: Implement setParentRelativeClassPath() method.
        throw new LogicException('Unimplemented [setParentRelativeClassPath] method.');
    }

    public function setSourceDirectoryPath($SourceDirectoryPath): ActorInterface
    {
        // TODO: Implement setSourceDirectoryPath() method.
        throw new LogicException('Unimplemented [setSourceDirectoryPath] method.');
    }

    public function setFabricationDirectoryPath($FabricationDirectoryPath): ActorInterface
    {
        // TODO: Implement setFabricationDirectoryPath() method.
        throw new LogicException('Unimplemented [setFabricationDirectoryPath] method.');
    }

    public function setSourceFilePath(string $SourceFilePath): ActorInterface
    {
        // TODO: Implement setSourceFilePath() method.
        throw new LogicException('Unimplemented [setSourceFilePath] method.');
    }

    public function setFileName(string $FileName): ActorInterface
    {
        // TODO: Implement setFileName() method.
        throw new LogicException('Unimplemented [setFileName] method.');
    }

    public function setFileExtension(string $FileExtension): ActorInterface
    {
        // TODO: Implement setFileExtension() method.
        throw new LogicException('Unimplemented [setFileExtension] method.');
    }

    public function getFileName(): string
    {
        // TODO: Implement getFileName() method.
        throw new LogicException('Unimplemented [getFileName] method.');
    }

    public function setFabricationFilePath(string $FabricationFilePath): ActorInterface
    {
        // TODO: Implement setFabricationFilePath() method.
        throw new LogicException('Unimplemented [setFabricationFilePath] method.');
    }
}
