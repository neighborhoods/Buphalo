<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Buphalo\Factory;

use LogicException;
use Neighborhoods\Buphalo\Buphalo\FactoryInterface;

trait AwareTrait
{
    protected $NeighborhoodsBuphaloBuphaloFactory;

    public function setBuphaloFactory(FactoryInterface $buphaloFactory): self
    {
        if ($this->hasBuphaloFactory()) {
            throw new LogicException('Neighborhoods Buphalo Buphalo Factory is already set.');
        }
        $this->NeighborhoodsBuphaloBuphaloFactory = $buphaloFactory;

        return $this;
    }

    protected function getBuphaloFactory(): FactoryInterface
    {
        if (!$this->hasBuphaloFactory()) {
            throw new LogicException('Neighborhoods Buphalo Buphalo Factory is not set.');
        }

        return $this->NeighborhoodsBuphaloBuphaloFactory;
    }

    protected function hasBuphaloFactory(): bool
    {
        return isset($this->NeighborhoodsBuphaloBuphaloFactory);
    }

    protected function unsetBuphaloFactory(): self
    {
        if (!$this->hasBuphaloFactory()) {
            throw new LogicException('Neighborhoods Buphalo Buphalo Factory is not set.');
        }
        unset($this->NeighborhoodsBuphaloBuphaloFactory);

        return $this;
    }
}
