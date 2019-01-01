<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

class TargetPrimaryActor implements TargetPrimaryActorInterface
{
    use FabricationFile\AwareTrait;
    use TargetApplication\AwareTrait;

    protected $relative_name_path;
    protected $namespace;
    protected $full_name;
    protected $file_path_position;
    protected $short_name;

    public function getRelativeNamePath(): string
    {
        if ($this->relative_name_path === null) {
            $filePath = $this->getFilePathPosition();
            $relativeNamePath = str_replace(
                sprintf('%s/', $this->getTargetApplication()->getSourcePath()),
                '',
                $filePath
            );
            $relativeNamePath = str_replace(
                '/',
                '\\',
                $relativeNamePath
            );
            $this->relative_name_path = $relativeNamePath;
        }

        return $this->relative_name_path;
    }

    public function getNamespace(): string
    {
        if ($this->namespace === null) {
            $namespace = $this->getTargetApplication()->getNamespace();
            $this->namespace = $namespace;
        }

        return $this->namespace;
    }

    public function getFullName(): string
    {
        if ($this->full_name === null) {
            $relativeNamePath = $this->getRelativeNamePath();
            $fullName = str_replace('\\', '', $relativeNamePath);
            $this->full_name = $fullName;
        }

        return $this->full_name;
    }

    public function getShortName(): string
    {
        if ($this->short_name === null) {
            $relativeNamePath = $this->getRelativeNamePath();
            $start = 0;
            $position = strrpos($relativeNamePath, '\\');
            if ($position !== false) {
                $start = $position + 1;
            }
            $this->short_name = trim(substr($relativeNamePath, $start));
        }

        return $this->short_name;
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
