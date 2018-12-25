<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

class TargetApplication implements TargetApplicationInterface
{
    protected $source_path;
    protected $fabrication_path;
    protected $namespace;

    public function getSourcePath(): string
    {
        if ($this->source_path === null) {
            throw new \LogicException('TargetApplication source_path has not been set.');
        }

        return $this->source_path;
    }

    public function setSourcePath(string $source_path): TargetApplicationInterface
    {
        if ($this->source_path !== null) {
            throw new \LogicException('TargetApplication source_path is already set.');
        }

        $this->source_path = $source_path;

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
