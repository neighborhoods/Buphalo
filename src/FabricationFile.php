<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

use LogicException;
use Neighborhoods\Bradfab\FabricationFile\Actor\MapInterface;

class FabricationFile implements FabricationFileInterface
{
    protected $file_name;
    protected $file_path;
    protected $relative_file_path;
    protected $relative_directory_path;
    protected $actors;

    public function getActors(): MapInterface
    {
        if ($this->actors === null) {
            throw new LogicException('FabricationFile actors has not been set.');
        }

        return $this->actors;
    }

    public function setActors(MapInterface $actors): FabricationFileInterface
    {
        if ($this->actors !== null) {
            throw new LogicException('FabricationFile actors is already set.');
        }

        $this->actors = $actors;

        return $this;
    }

    public function getFileName(): string
    {
        if ($this->file_name === null) {
            throw new LogicException('FabricationFile file_name has not been set.');
        }

        return $this->file_name;
    }

    public function setFileName(string $file_name): FabricationFileInterface
    {
        if ($this->file_name !== null) {
            throw new LogicException('FabricationFile file_name is already set.');
        }

        $this->file_name = $file_name;

        return $this;
    }

    public function getFilePath(): string
    {
        if ($this->file_path === null) {
            throw new LogicException('FabricationFile file_path has not been set.');
        }

        return $this->file_path;
    }

    public function setFilePath(string $file_path): FabricationFileInterface
    {
        if ($this->file_path !== null) {
            throw new LogicException('FabricationFile file_path is already set.');
        }

        $this->file_path = $file_path;

        return $this;
    }

    public function getRelativeFilePath(): string
    {
        if ($this->relative_file_path === null) {
            throw new LogicException('FabricationFile relative_file_path has not been set.');
        }

        return $this->relative_file_path;
    }

    public function setRelativeFilePath(string $relative_file_path): FabricationFileInterface
    {
        if ($this->relative_file_path !== null) {
            throw new LogicException('FabricationFile relative_file_path is already set.');
        }

        $this->relative_file_path = $relative_file_path;

        return $this;
    }

    public function getRelativeDirectoryPath(): string
    {
        if ($this->relative_directory_path === null) {
            throw new LogicException('FabricationFile relative_directory_path has not been set.');
        }

        return $this->relative_directory_path;
    }

    public function setRelativeDirectoryPath(string $relative_directory_path): FabricationFileInterface
    {
        if ($this->relative_directory_path !== null) {
            throw new LogicException('FabricationFile relative_directory_path is already set.');
        }

        $this->relative_directory_path = $relative_directory_path;

        return $this;
    }
}
