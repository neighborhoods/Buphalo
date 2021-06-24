<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Buphalo\Builder\Factory;

use LogicException;
use Neighborhoods\Buphalo\V2\Buphalo\Builder\FactoryInterface;

trait AwareTrait
{
    protected $NeighborhoodsBuphaloBuphaloBuilderFactory;

    public function setBuphaloBuilderFactory(FactoryInterface $buphaloBuilderFactory): self
    {
        if ($this->hasBuphaloBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Buphalo Builder Factory is already set.');
        }
        $this->NeighborhoodsBuphaloBuphaloBuilderFactory = $buphaloBuilderFactory;

        return $this;
    }

    protected function getBuphaloBuilderFactory(): FactoryInterface
    {
        if (!$this->hasBuphaloBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Buphalo Builder Factory is not set.');
        }

        return $this->NeighborhoodsBuphaloBuphaloBuilderFactory;
    }

    protected function hasBuphaloBuilderFactory(): bool
    {
        return isset($this->NeighborhoodsBuphaloBuphaloBuilderFactory);
    }

    protected function unsetBuphaloBuilderFactory(): self
    {
        if (!$this->hasBuphaloBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Buphalo Builder Factory is not set.');
        }
        unset($this->NeighborhoodsBuphaloBuphaloBuilderFactory);

        return $this;
    }
}
