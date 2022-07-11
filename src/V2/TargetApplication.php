<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2;

use LogicException;

class TargetApplication implements TargetApplicationInterface
{
    protected $SourceDirectoryPath;
    protected $FabricationDirectoryPath;
    protected $NamespacePrefix;

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

    public function getFabricationDirectoryPath(): string
    {
        if ($this->FabricationDirectoryPath === null) {
            throw new LogicException('Target Application Fabrication Directory Path has not been set.');
        }

        return $this->FabricationDirectoryPath;
    }

    public function setFabricationDirectoryPath(string $FabricationDirectoryPath): TargetApplicationInterface
    {
        if ($this->FabricationDirectoryPath !== null) {
            throw new LogicException('Target Application Fabrication Directory Path is already set.');
        }

        $this->FabricationDirectoryPath = $FabricationDirectoryPath;

        return $this;
    }

    public function getNamespacePrefix(): string
    {
        if ($this->NamespacePrefix === null) {
            throw new LogicException('Target Application Namespace Prefix has not been set.');
        }

        return $this->NamespacePrefix;
    }

    public function setNamespacePrefix(string $NamespacePrefix): TargetApplicationInterface
    {
        if ($this->NamespacePrefix !== null) {
            throw new LogicException('Target Application Namespace Prefix is already set.');
        }

        $this->NamespacePrefix = $NamespacePrefix;

        return $this;
    }
}
