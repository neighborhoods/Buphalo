<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

use Neighborhoods\Bradfab\FabricationFile\SupportingActor\MapInterface;

class FabricationFile implements FabricationFileInterface
{
    protected $file_name;
    protected $file_path;
    protected $relative_file_path;
    protected $relative_directory_path;
    protected $supporting_actors;

    public function getSupportingActors(): MapInterface
    {
        if ($this->supporting_actors === null) {
            throw new \LogicException('FabricationFile supporting_actors has not been set.');
        }

        return $this->supporting_actors;
    }

    public function setSupportingActors(MapInterface $supporting_actors): FabricationFileInterface
    {
        if ($this->supporting_actors !== null) {
            throw new \LogicException('FabricationFile supporting_actors is already set.');
        }

        $this->supporting_actors = $supporting_actors;

        return $this;
    }

    public function getFileName(): string
    {
        if ($this->file_name === null) {
            throw new \LogicException('FabricationFile file_name has not been set.');
        }

        return $this->file_name;
    }

    public function setFileName(string $file_name): FabricationFileInterface
    {
        if ($this->file_name !== null) {
            throw new \LogicException('FabricationFile file_name is already set.');
        }

        $this->file_name = $file_name;

        return $this;
    }

    public function getFilePath(): string
    {
        if ($this->file_path === null) {
            throw new \LogicException('FabricationFile file_path has not been set.');
        }

        return $this->file_path;
    }

    public function setFilePath(string $file_path): FabricationFileInterface
    {
        if ($this->file_path !== null) {
            throw new \LogicException('FabricationFile file_path is already set.');
        }

        $this->file_path = $file_path;

        return $this;
    }

    public function getRelativeFilePath(): string
    {
        if ($this->relative_file_path === null) {
            throw new \LogicException('FabricationFile relative_file_path has not been set.');
        }

        return $this->relative_file_path;
    }

    public function setRelativeFilePath(string $relative_file_path): FabricationFileInterface
    {
        if ($this->relative_file_path !== null) {
            throw new \LogicException('FabricationFile relative_file_path is already set.');
        }

        $this->relative_file_path = $relative_file_path;

        return $this;
    }

    public function getRelativeDirectoryPath(): string
    {
        if ($this->relative_directory_path === null) {
            throw new \LogicException('FabricationFile relative_directory_path has not been set.');
        }

        return $this->relative_directory_path;
    }

    public function setRelativeDirectoryPath(string $relative_directory_path): FabricationFileInterface
    {
        if ($this->relative_directory_path !== null) {
            throw new \LogicException('FabricationFile relative_directory_path is already set.');
        }

        $this->relative_directory_path = $relative_directory_path;

        return $this;
    }
}
