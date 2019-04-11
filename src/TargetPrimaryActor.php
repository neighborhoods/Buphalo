<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

class TargetPrimaryActor implements TargetPrimaryActorInterface
{
    use FabricationFile\AwareTrait;
    use TargetApplication\AwareTrait;

    protected $RelativeParentClassPath;
    protected $Namespace;
    protected $FullPascalCaseName;
    protected $ShortPascalCaseName;
    protected $SourceDirectoryPath;
    protected $FabricationDirectoryPath;
    protected $RelativeClassPath;

    public function getRelativeParentClassPath(): string
    {
        if ($this->RelativeParentClassPath === null) {
            $filePath = $this->getSourceDirectoryPath();
            $relativeParentClassPath = ltrim(
                str_replace(
                    $this->getTargetApplication()->getSourceDirectoryPath(),
                    '',
                    $filePath
                ),
                '/'
            );
            $relativeParentClassPath = str_replace(
                '/',
                '\\',
                $relativeParentClassPath
            );
            $this->RelativeParentClassPath = $relativeParentClassPath;
        }

        return $this->RelativeParentClassPath;
    }

    public function getRelativeClassPath(): string
    {
        if ($this->RelativeClassPath === null) {
            $relativeClassPath = sprintf(
                '%s\%s',
                $this->getRelativeParentClassPath(),
                $this->getShortCapitalCamelCaseName()
            );
            $this->RelativeClassPath = $relativeClassPath;
        }

        return $this->RelativeClassPath;
    }

    public function getNamespace(): string
    {
        if ($this->Namespace === null) {
            $namespace = $this->getTargetApplication()->getNamespace();
            $this->Namespace = $namespace;
        }

        return $this->Namespace;
    }

    public function getFullPascalCaseName(): string
    {
        if ($this->FullPascalCaseName === null) {
            $relativeClassPath = $this->getRelativeParentClassPath();
            $fullPascalCaseName = str_replace('\\', '', $relativeClassPath);
            $this->FullPascalCaseName = $fullPascalCaseName;
        }

        return $this->FullPascalCaseName;
    }

    public function getShortCapitalCamelCaseName(): string
    {
        if ($this->ShortPascalCaseName === null) {
            $extensionRemoved = str_replace(
                FabricationFileInterface::FILE_EXTENSION_FABRICATION,
                '',
                $this->getFabricationFile()->getRelativeFilePath()
            );
            $position = strrpos($extensionRemoved, '/');
            if ($position !== false) {
                $shortPascalCaseName = substr($extensionRemoved, $position + 1);
            } else {
                $shortPascalCaseName = $extensionRemoved;
            }
            $this->ShortPascalCaseName = $shortPascalCaseName;
        }

        return $this->ShortPascalCaseName;
    }

    public function getSourceDirectoryPath(): string
    {
        if ($this->SourceDirectoryPath === null) {
            $fabricationFilePath = $this->getFabricationFile()->getFilePath();
            $sourceDirectoryPath = substr(
                $fabricationFilePath,
                0,
                strrpos(
                    $fabricationFilePath,
                    sprintf('/%s', $this->getShortCapitalCamelCaseName())
                )
            );
            $this->SourceDirectoryPath = $sourceDirectoryPath;
        }

        return $this->SourceDirectoryPath;
    }

    public function getFabricationDirectoryPath(): string
    {
        if ($this->FabricationDirectoryPath === null) {
            $fabricationDirectoryPath = str_replace(
                $this->getTargetApplication()->getSourceDirectoryPath(),
                $this->getTargetApplication()->getFabricationPath(),
                $this->getSourceDirectoryPath()
            );
            $this->FabricationDirectoryPath = $fabricationDirectoryPath;
        }

        return $this->FabricationDirectoryPath;
    }
}
