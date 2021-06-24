<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\Map\Builder;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\Map\BuilderInterface;

trait AwareTrait
{
    protected $DORV1CarMapBuilder;

    public function setDORV1CarMapBuilder(BuilderInterface $CarMapBuilder): self
    {
        if ($this->hasDORV1CarMapBuilder()) {
            throw new LogicException('DORV1CarMapBuilder is already set.');
        }
        $this->DORV1CarMapBuilder = $CarMapBuilder;

        return $this;
    }

    protected function getDORV1CarMapBuilder(): BuilderInterface
    {
        if (!$this->hasDORV1CarMapBuilder()) {
            throw new LogicException('DORV1CarMapBuilder is not set.');
        }

        return $this->DORV1CarMapBuilder;
    }

    protected function hasDORV1CarMapBuilder(): bool
    {
        return isset($this->DORV1CarMapBuilder);
    }

    protected function unsetDORV1CarMapBuilder(): self
    {
        if (!$this->hasDORV1CarMapBuilder()) {
            throw new LogicException('DORV1CarMapBuilder is not set.');
        }
        unset($this->DORV1CarMapBuilder);

        return $this;
    }
}
