<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\Map\Factory;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\Map\FactoryInterface;

trait AwareTrait
{
    protected $DORV1CarMapFactory;

    public function setDORV1CarMapFactory(FactoryInterface $CarMapFactory): self
    {
        if ($this->hasDORV1CarMapFactory()) {
            throw new LogicException('DORV1CarMapFactory is already set.');
        }
        $this->DORV1CarMapFactory = $CarMapFactory;

        return $this;
    }

    protected function getDORV1CarMapFactory(): FactoryInterface
    {
        if (!$this->hasDORV1CarMapFactory()) {
            throw new LogicException('DORV1CarMapFactory is not set.');
        }

        return $this->DORV1CarMapFactory;
    }

    protected function hasDORV1CarMapFactory(): bool
    {
        return isset($this->DORV1CarMapFactory);
    }

    protected function unsetDORV1CarMapFactory(): self
    {
        if (!$this->hasDORV1CarMapFactory()) {
            throw new LogicException('DORV1CarMapFactory is not set.');
        }
        unset($this->DORV1CarMapFactory);

        return $this;
    }
}
