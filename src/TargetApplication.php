<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo;

use LogicException;

class TargetApplication implements TargetApplicationInterface
{
    protected $SourceDirectoryPath;
    protected $FabricationPath;
    protected $Namespace;

    public function getSourceDirectoryPath(): string
    {
        if ($this->SourceDirectoryPath === null) {
            throw new LogicException('Target Application Source Directory Path has not been set.');
        }

        return $this->SourceDirectoryPath;
    }

    public function setSourceDirectoryPath(string $source_directory_path): TargetApplicationInterface
    {
        if ($this->SourceDirectoryPath !== null) {
            throw new LogicException('Target Application Source Directory Path is already set.');
        }

        $this->SourceDirectoryPath = $source_directory_path;

        return $this;
    }

    public function getFabricationPath(): string
    {
        if ($this->FabricationPath === null) {
            throw new LogicException('Target Application Fabrication Path has not been set.');
        }

        return $this->FabricationPath;
    }

    public function setFabricationPath(string $fabrication_path): TargetApplicationInterface
    {
        if ($this->FabricationPath !== null) {
            throw new LogicException('Target Application Fabrication Path is already set.');
        }

        $this->FabricationPath = $fabrication_path;

        return $this;
    }

    public function getNamespace(): string
    {
        if ($this->Namespace === null) {
            throw new LogicException('Target Application Namespace has not been set.');
        }

        return $this->Namespace;
    }

    public function setNamespace(string $namespace): TargetApplicationInterface
    {
        if ($this->Namespace !== null) {
            throw new LogicException('Target Application Namespace is already set.');
        }

        $this->Namespace = $namespace;

        return $this;
    }
}
