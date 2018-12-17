<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

class TargetApplication implements TargetApplicationInterface
{
    protected $source_path;
    protected $fabrication_path;
    protected $fqcn;

    public function getSourcePath()
    {
        if ($this->source_path === null) {
            throw new \LogicException('TargetApplication source_path has not been set.');
        }

        return $this->source_path;
    }

    public function setSourcePath($source_path): TargetApplicationInterface
    {
        if ($this->source_path !== null) {
            throw new \LogicException('TargetApplication source_path is already set.');
        }

        $this->source_path = $source_path;

        return $this;
    }

    public function getFabricationPath()
    {
        if ($this->fabrication_path === null) {
            throw new \LogicException('TargetApplication fabrication_path has not been set.');
        }

        return $this->fabrication_path;
    }

    public function setFabricationPath($fabrication_path): TargetApplicationInterface
    {
        if ($this->fabrication_path !== null) {
            throw new \LogicException('TargetApplication fabrication_path is already set.');
        }

        $this->fabrication_path = $fabrication_path;

        return $this;
    }

    public function getFqcn()
    {
        if ($this->fqcn === null) {
            throw new \LogicException('TargetApplication fqcn has not been set.');
        }

        return $this->fqcn;
    }

    public function setFqcn($fqcn): TargetApplicationInterface
    {
        if ($this->fqcn !== null) {
            throw new \LogicException('TargetApplication fqcn is already set.');
        }

        $this->fqcn = $fqcn;

        return $this;
    }
}
