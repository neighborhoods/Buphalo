<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

class TargetApplication implements TargetApplicationInterface
{
    protected $source_directory_path;
    protected $fabrication_path;
    protected $namespace;

    public function getSourceDirectoryPath(): string
    {
        if ($this->source_directory_path === null) {
            throw new \LogicException('TargetApplication source_directory_path has not been set.');
        }

        return $this->source_directory_path;
    }

    public function setSourceDirectoryPath(string $source_directory_path): TargetApplicationInterface
    {
        if ($this->source_directory_path !== null) {
            throw new \LogicException('TargetApplication source_directory_path is already set.');
        }

        $this->source_directory_path = $source_directory_path;

        return $this;
    }

    public function getFabricationPath(): string
    {
        if ($this->fabrication_path === null) {
            throw new \LogicException('TargetApplication fabrication_path has not been set.');
        }

        return $this->fabrication_path;
    }

    public function setFabricationPath(string $fabrication_path): TargetApplicationInterface
    {
        if ($this->fabrication_path !== null) {
            throw new \LogicException('TargetApplication fabrication_path is already set.');
        }

        $this->fabrication_path = $fabrication_path;

        return $this;
    }

    public function getNamespace(): string
    {
        if ($this->namespace === null) {
            throw new \LogicException('TargetApplication namespace has not been set.');
        }

        return $this->namespace;
    }

    public function setNamespace(string $namespace): TargetApplicationInterface
    {
        if ($this->namespace !== null) {
            throw new \LogicException('TargetApplication namespace is already set.');
        }

        $this->namespace = $namespace;

        return $this;
    }
}
