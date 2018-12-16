<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Fabricator\Builder\Factory;

use Rhift\Bradfab\Fabricator\Builder\FactoryInterface;

trait AwareTrait
{
    protected $FabricatorBuilderFactory;

    public function setFabricatorBuilderFactory(FactoryInterface $FabricatorBuilderFactory): self
    {
        if ($this->hasFabricatorBuilderFactory()) {
            throw new \LogicException('FabricatorBuilderFactory is already set.');
        }
        $this->FabricatorBuilderFactory = $FabricatorBuilderFactory;

        return $this;
    }

    protected function getFabricatorBuilderFactory(): FactoryInterface
    {
        if (!$this->hasFabricatorBuilderFactory()) {
            throw new \LogicException('FabricatorBuilderFactory is not set.');
        }

        return $this->FabricatorBuilderFactory;
    }

    protected function hasFabricatorBuilderFactory(): bool
    {
        return isset($this->FabricatorBuilderFactory);
    }

    protected function unsetFabricatorBuilderFactory(): self
    {
        if (!$this->hasFabricatorBuilderFactory()) {
            throw new \LogicException('FabricatorBuilderFactory is not set.');
        }
        unset($this->FabricatorBuilderFactory);

        return $this;
    }
}
