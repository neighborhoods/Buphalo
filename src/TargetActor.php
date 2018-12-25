<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

class TargetActor implements TargetActorInterface
{
    use FabricationFile\AwareTrait;
    use TargetApplication\AwareTrait;

    protected $relative_name_path;
    protected $fqcn;
    protected $short_name;
    protected $name;
    protected $file_path_position;

    public function getRelativeNamePath(): string
    {
        if ($this->relative_name_path === null) {
            $filePath = $this->getFilePathPosition();
            $relativeNamePath = str_replace(
                $this->getTargetApplication()->getSourcePath() . '/',
                '',
                $filePath
            );
            $this->relative_name_path = $relativeNamePath;
        }

        return $this->relative_name_path;
    }

    public function getFQCN(): string
    {
        if ($this->fqcn === null) {
            $relativeNamePath = $this->getRelativeNamePath();
            $FQCN = $this->getTargetApplication()->getNamespace() . $relativeNamePath;
            $FQCN = str_replace('/', '\\', $FQCN);
            $this->fqcn = $FQCN;
        }

        return $this->fqcn;
    }

    public function getShortName(): string
    {
        if ($this->short_name === null) {
            $relativeNamePath = $this->getRelativeNamePath();
            $start = 0;
            $position = strrpos($relativeNamePath, '/');
            if ($position !== false) {
                $start = $position + 1;
            }
            $this->short_name = trim(substr($relativeNamePath, $start));
        }

        return $this->short_name;
    }

    public function getName(): string
    {
        if ($this->name === null) {
            $this->name = str_replace('/', '', $this->getRelativeNamePath());
        }

        return $this->name;
    }

    public function getFilePathPosition(): string
    {
        if ($this->file_path_position === null) {
            $fabricationFilePath = $this->getFabricationFile()->getFilePath();
            $filePath = str_replace(
                FabricationFileInterface::FILE_EXTENSION_FABRICATION,
                '',
                $fabricationFilePath
            );
            $this->file_path_position = $filePath;
        }

        return $this->file_path_position;
    }
}
