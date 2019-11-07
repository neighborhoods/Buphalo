<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\Map\Builder\Factory;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\Map\Builder\FactoryInterface;

trait AwareTrait
{
    protected $DORV1CarMapBuilderFactory;

    public function setDORV1CarMapBuilderFactory(FactoryInterface $CarMapBuilderFactory): self
    {
        if ($this->hasDORV1CarMapBuilderFactory()) {
            throw new LogicException('DORV1CarMapBuilderFactory is already set.');
        }
        $this->DORV1CarMapBuilderFactory = $CarMapBuilderFactory;

        return $this;
    }

    protected function getDORV1CarMapBuilderFactory(): FactoryInterface
    {
        if (!$this->hasDORV1CarMapBuilderFactory()) {
            throw new LogicException('DORV1CarMapBuilderFactory is not set.');
        }

        return $this->DORV1CarMapBuilderFactory;
    }

    protected function hasDORV1CarMapBuilderFactory(): bool
    {
        return isset($this->DORV1CarMapBuilderFactory);
    }

    protected function unsetDORV1CarMapBuilderFactory(): self
    {
        if (!$this->hasDORV1CarMapBuilderFactory()) {
            throw new LogicException('DORV1CarMapBuilderFactory is not set.');
        }
        unset($this->DORV1CarMapBuilderFactory);

        return $this;
    }
}
