<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetApplication\Builder;

use LogicException;
use Neighborhoods\Bradfab\TargetApplication\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    protected $SourceDirectoryPath;
    protected $FabricationPath;
    protected $Namespace;

    public function create(): BuilderInterface
    {
        return clone $this->getTargetApplicationBuilder();
    }

    public function getSourceDirectoryPath(): string
    {
        if ($this->SourceDirectoryPath === null) {
            throw new LogicException('Source Directory Path has not been set.');
        }

        return $this->SourceDirectoryPath;
    }

    public function setSourceDirectoryPath(string $SourceDirectoryPath): FactoryInterface
    {
        if ($this->SourceDirectoryPath !== null) {
            throw new LogicException('Source Directory Path is already set.');
        }

        $this->SourceDirectoryPath = $SourceDirectoryPath;

        return $this;
    }

    public function getFabricationPath(): string
    {
        if ($this->FabricationPath === null) {
            throw new LogicException('Fabrication Path has not been set.');
        }

        return $this->FabricationPath;
    }

    public function setFabricationPath(string $FabricationPath): FactoryInterface
    {
        if ($this->FabricationPath !== null) {
            throw new LogicException('Fabrication Path is already set.');
        }

        $this->FabricationPath = $FabricationPath;

        return $this;
    }

    public function getNamespace(): string
    {
        if ($this->Namespace === null) {
            throw new LogicException('Namespace has not been set.');
        }

        return $this->Namespace;
    }

    public function setNamespace(string $Namespace): FactoryInterface
    {
        if ($this->Namespace !== null) {
            throw new LogicException('Namespace is already set.');
        }

        $this->Namespace = $Namespace;

        return $this;
    }
}
