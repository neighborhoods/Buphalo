<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Fabricator\Builder\Factory;

use LogicException;
use Neighborhoods\Buphalo\V2\Fabricator\Builder\FactoryInterface;

trait AwareTrait
{
    protected $NeighborhoodsBuphaloFabricatorBuilderFactory;

    public function setFabricatorBuilderFactory(FactoryInterface $fabricatorBuilderFactory): self
    {
        if ($this->hasFabricatorBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Fabricator Builder Factory is already set.');
        }
        $this->NeighborhoodsBuphaloFabricatorBuilderFactory = $fabricatorBuilderFactory;

        return $this;
    }

    protected function getFabricatorBuilderFactory(): FactoryInterface
    {
        if (!$this->hasFabricatorBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Fabricator Builder Factory is not set.');
        }

        return $this->NeighborhoodsBuphaloFabricatorBuilderFactory;
    }

    protected function hasFabricatorBuilderFactory(): bool
    {
        return isset($this->NeighborhoodsBuphaloFabricatorBuilderFactory);
    }

    protected function unsetFabricatorBuilderFactory(): self
    {
        if (!$this->hasFabricatorBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Fabricator Builder Factory is not set.');
        }
        unset($this->NeighborhoodsBuphaloFabricatorBuilderFactory);

        return $this;
    }
}
