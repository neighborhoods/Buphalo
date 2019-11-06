<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\Builder\Factory;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\Builder\FactoryInterface;

trait AwareTrait
{
    protected $DORV1CarBuilderFactory;

    public function setDORV1CarBuilderFactory(FactoryInterface $CarBuilderFactory): self
    {
        if ($this->hasDORV1CarBuilderFactory()) {
            throw new LogicException('DORV1CarBuilderFactory is already set.');
        }
        $this->DORV1CarBuilderFactory = $CarBuilderFactory;

        return $this;
    }

    protected function getDORV1CarBuilderFactory(): FactoryInterface
    {
        if (!$this->hasDORV1CarBuilderFactory()) {
            throw new LogicException('DORV1CarBuilderFactory is not set.');
        }

        return $this->DORV1CarBuilderFactory;
    }

    protected function hasDORV1CarBuilderFactory(): bool
    {
        return isset($this->DORV1CarBuilderFactory);
    }

    protected function unsetDORV1CarBuilderFactory(): self
    {
        if (!$this->hasDORV1CarBuilderFactory()) {
            throw new LogicException('DORV1CarBuilderFactory is not set.');
        }
        unset($this->DORV1CarBuilderFactory);

        return $this;
    }
}
