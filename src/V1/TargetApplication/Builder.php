<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\TargetApplication;

use LogicException;
use Neighborhoods\Buphalo\V1\TargetApplicationInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    protected $SourceDirectoryPath;
    protected $FabricationDirectoryPath;
    protected $NamespacePrefix;

    public function build(): TargetApplicationInterface
    {
        return $this->getTargetApplicationFactory()->create()
            ->setSourceDirectoryPath($this->getSourceDirectoryPath())
            ->setFabricationDirectoryPath($this->getFabricationDirectoryPath())
            ->setNamespacePrefix($this->getNamespacePrefix());
    }

    protected function getSourceDirectoryPath(): string
    {
        if ($this->SourceDirectoryPath === null) {
            throw new LogicException('Source Directory Path has not been set.');
        }

        return $this->SourceDirectoryPath;
    }

    public function setSourceDirectoryPath(string $SourceDirectoryPath): BuilderInterface
    {
        if ($this->SourceDirectoryPath !== null) {
            throw new LogicException('Source Directory Path is already set.');
        }

        $this->SourceDirectoryPath = $SourceDirectoryPath;

        return $this;
    }

    protected function getFabricationDirectoryPath(): string
    {
        if ($this->FabricationDirectoryPath === null) {
            throw new LogicException('Fabrication Directory Path has not been set.');
        }

        return $this->FabricationDirectoryPath;
    }

    public function setFabricationDirectoryPath(string $FabricationDirectoryPath): BuilderInterface
    {
        if ($this->FabricationDirectoryPath !== null) {
            throw new LogicException('Fabrication Directory Path is already set.');
        }

        $this->FabricationDirectoryPath = $FabricationDirectoryPath;

        return $this;
    }

    protected function getNamespacePrefix(): string
    {
        if ($this->NamespacePrefix === null) {
            throw new LogicException('Namespace Prefix has not been set.');
        }

        return $this->NamespacePrefix;
    }

    public function setNamespacePrefix(string $NamespacePrefix): BuilderInterface
    {
        if ($this->NamespacePrefix !== null) {
            throw new LogicException('Namespace Prefix is already set.');
        }

        $this->NamespacePrefix = $NamespacePrefix;

        return $this;
    }
}
