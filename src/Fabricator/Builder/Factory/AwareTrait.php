<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Fabricator\Builder\Factory;

use LogicException;
use Neighborhoods\Bradfab\Fabricator\Builder\FactoryInterface;

trait AwareTrait
{
    protected $NeighborhoodsBradfabFabricatorBuilderFactory;

    public function setFabricatorBuilderFactory(FactoryInterface $fabricatorBuilderFactory): self
    {
        if ($this->hasFabricatorBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Fabricator Builder Factory is already set.');
        }
        $this->NeighborhoodsBradfabFabricatorBuilderFactory = $fabricatorBuilderFactory;

        return $this;
    }

    protected function getFabricatorBuilderFactory(): FactoryInterface
    {
        if (!$this->hasFabricatorBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Fabricator Builder Factory is not set.');
        }

        return $this->NeighborhoodsBradfabFabricatorBuilderFactory;
    }

    protected function hasFabricatorBuilderFactory(): bool
    {
        return isset($this->NeighborhoodsBradfabFabricatorBuilderFactory);
    }

    protected function unsetFabricatorBuilderFactory(): self
    {
        if (!$this->hasFabricatorBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Fabricator Builder Factory is not set.');
        }
        unset($this->NeighborhoodsBradfabFabricatorBuilderFactory);

        return $this;
    }
}
