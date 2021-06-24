<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\Factory;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\FactoryInterface;

trait AwareTrait
{
    protected $DORV1CarFactory;

    public function setDORV1CarFactory(FactoryInterface $CarFactory): self
    {
        if ($this->hasDORV1CarFactory()) {
            throw new LogicException('DORV1CarFactory is already set.');
        }
        $this->DORV1CarFactory = $CarFactory;

        return $this;
    }

    protected function getDORV1CarFactory(): FactoryInterface
    {
        if (!$this->hasDORV1CarFactory()) {
            throw new LogicException('DORV1CarFactory is not set.');
        }

        return $this->DORV1CarFactory;
    }

    protected function hasDORV1CarFactory(): bool
    {
        return isset($this->DORV1CarFactory);
    }

    protected function unsetDORV1CarFactory(): self
    {
        if (!$this->hasDORV1CarFactory()) {
            throw new LogicException('DORV1CarFactory is not set.');
        }
        unset($this->DORV1CarFactory);

        return $this;
    }
}
