<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetApplication;

use LogicException;
use Neighborhoods\Bradfab\TargetApplicationInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    protected $SourceDirectoryPath;
    protected $FabricationPath;
    protected $Namespace;

    public function build(): TargetApplicationInterface
    {
        return $this->getTargetApplicationFactory()->create()
            ->setSourceDirectoryPath($this->getSourceDirectoryPath())
            ->setFabricationPath($this->getFabricationPath())
            ->setNamespace($this->getNamespace());
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

    protected function getFabricationPath(): string
    {
        if ($this->FabricationPath === null) {
            throw new LogicException('Fabrication Path has not been set.');
        }

        return $this->FabricationPath;
    }

    public function setFabricationPath(string $FabricationPath): BuilderInterface
    {
        if ($this->FabricationPath !== null) {
            throw new LogicException('Fabrication Path is already set.');
        }

        $this->FabricationPath = $FabricationPath;

        return $this;
    }

    protected function getNamespace(): string
    {
        if ($this->Namespace === null) {
            throw new LogicException('Namespace has not been set.');
        }

        return $this->Namespace;
    }

    public function setNamespace(string $Namespace): BuilderInterface
    {
        if ($this->Namespace !== null) {
            throw new LogicException('Namespace is already set.');
        }

        $this->Namespace = $Namespace;

        return $this;
    }
}
