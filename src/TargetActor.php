<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

class TargetActor implements TargetActorInterface
{
    use FabricationFile\Actor\AwareTrait;
    use TargetPrimaryActor\AwareTrait;

    protected $short_name;
    protected $fabrication_file_path;
    protected $relative_fabrication_file_path;
    protected $relative_name_path;
    protected $relative_class_name_path;
    protected $file_extension;

    public function getShortName(): string
    {
        if ($this->short_name === null) {
            $relativeNamePath = $this->getRelativeNamePath();
            $start = 0;
            $position = strrpos($relativeNamePath, '/');
            if ($position !== false) {
                $start = $position + 1;
            }
            $shortName = trim(substr($relativeNamePath, $start));
            $this->short_name = $shortName;
        }

        return $this->short_name;
    }

    public function getFabricationFilePath(): string
    {
        if ($this->fabrication_file_path === null) {
            $fabricationDirectoryPath = $this->getTargetPrimaryActor()->getFabricationDirectoryPath();
            $fabricationFilePath = sprintf('%s/%s', $fabricationDirectoryPath, $this->getRelativeFabricationFilePath());
            $this->fabrication_file_path = $fabricationFilePath;
        }

        return $this->fabrication_file_path;
    }

    public function getSourceFilePath(): string
    {

    }

    public function getRelativeFabricationFilePath(): string
    {
        if ($this->relative_fabrication_file_path === null) {
            $relativeNamePath = $this->getRelativeNamePath();
            $relativeFabricationFilePath = sprintf(
                '%s%s',
                $relativeNamePath,
                $this->getFileExtension()
            );
            $this->relative_fabrication_file_path = $relativeFabricationFilePath;
        }

        return $this->relative_fabrication_file_path;
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
