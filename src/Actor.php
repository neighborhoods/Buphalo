<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;


use LogicException;

class Actor implements ActorInterface
{
    use FabricationFile\Actor\AwareTrait;
    use TargetPrimaryActor\AwareTrait;

    protected $ShortPascalCaseName;
    protected $FabricationFilePath;
    protected $RelativeFabricationFilePath;
    protected $relative_name_path;
    protected $relative_class_name_path;
    protected $file_extension;

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

    public function getFabricationFilePath(): string
    {
        if ($this->FabricationFilePath === null) {
            $fabricationDirectoryPath = $this->getTargetPrimaryActor()->getFabricationDirectoryPath();
            $fabricationFilePath = sprintf('%s/%s', $fabricationDirectoryPath, $this->getRelativeFabricationFilePath());
            $this->FabricationFilePath = $fabricationFilePath;
        }

        return $this->FabricationFilePath;
    }

    public function getSourceFilePath(): string
    {
        throw new LogicException('Get source file path is not implemented.');
    }

    public function getRelativeFabricationFilePath(): string
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

    public function getRelativeNamePath(): string
    {
        if ($this->relative_name_path === null) {
            $fabricationFileActor = $this->getFabricationFileActor();
            $relativeNamePath = $fabricationFileActor->getRelativeTemplatePath();
            if ($fabricationFileActor->hasLooksLikeRelativeTemplatePath()) {
                $relativeNamePath = $fabricationFileActor->getLooksLikeRelativeTemplatePath();
            }
            $this->relative_name_path = $relativeNamePath;
        }

        return $this->relative_name_path;
    }

    public function getRelativeClassNamePath(): string
    {
        if ($this->relative_class_name_path === null) {
            $relativeClassNamePath = str_replace('/', '\\', $this->getRelativeNamePath());
            $this->relative_class_name_path = $relativeClassNamePath;
        }

        return $this->relative_class_name_path;
    }

    public function getFileExtension(): string
    {
        if ($this->file_extension === null) {
            $fileExtension = $this->getFabricationFileActor()->getTemplateFileExtension();
            if ($this->getFabricationFileActor()->hasLooksLikeTemplateFileExtension()) {
                $fileExtension = $this->getFabricationFileActor()->getLooksLikeTemplateFileExtension();
            }
            $this->file_extension = $fileExtension;
        }

        return $this->file_extension;
    }
}
