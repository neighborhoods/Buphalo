<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\Builder;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\BuilderInterface;

trait AwareTrait
{
    protected $DORV1CarBuilder;

    public function setDORV1CarBuilder(BuilderInterface $CarBuilder): self
    {
        if ($this->hasDORV1CarBuilder()) {
            throw new LogicException('DORV1CarBuilder is already set.');
        }
        $this->DORV1CarBuilder = $CarBuilder;

        return $this;
    }

    protected function getDORV1CarBuilder(): BuilderInterface
    {
        if (!$this->hasDORV1CarBuilder()) {
            throw new LogicException('DORV1CarBuilder is not set.');
        }

        return $this->DORV1CarBuilder;
    }

    protected function hasDORV1CarBuilder(): bool
    {
        return isset($this->DORV1CarBuilder);
    }

    protected function unsetDORV1CarBuilder(): self
    {
        if (!$this->hasDORV1CarBuilder()) {
            throw new LogicException('DORV1CarBuilder is not set.');
        }
        unset($this->DORV1CarBuilder);

        return $this;
    }
}
