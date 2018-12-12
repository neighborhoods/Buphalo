<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\Map\Builder\Factory;

use Rhift\BradFab\FabricationFile\Map\Builder\FactoryInterface;

trait AwareTrait
{
    protected $FabricationFileMapBuilderFactory;

    public function setFabricationFileMapBuilderFactory(FactoryInterface $FabricationFileMapBuilderFactory): self
    {
        if ($this->hasFabricationFileMapBuilderFactory()) {
            throw new \LogicException('FabricationFileMapBuilderFactory is already set.');
        }
        $this->FabricationFileMapBuilderFactory = $FabricationFileMapBuilderFactory;

        return $this;
    }

    protected function getFabricationFileMapBuilderFactory(): FactoryInterface
    {
        if (!$this->hasFabricationFileMapBuilderFactory()) {
            throw new \LogicException('FabricationFileMapBuilderFactory is not set.');
        }

        return $this->FabricationFileMapBuilderFactory;
    }

    protected function hasFabricationFileMapBuilderFactory(): bool
    {
        return isset($this->FabricationFileMapBuilderFactory);
    }

    protected function unsetFabricationFileMapBuilderFactory(): self
    {
        if (!$this->hasFabricationFileMapBuilderFactory()) {
            throw new \LogicException('FabricationFileMapBuilderFactory is not set.');
        }
        unset($this->FabricationFileMapBuilderFactory);

        return $this;
    }
}
