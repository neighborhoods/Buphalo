<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\Map;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\MapInterface;

trait AwareTrait
{
    protected $DORV1Cars;

    public function setDORV1CarMap(MapInterface $Cars): self
    {
        if ($this->hasDORV1CarMap()) {
            throw new LogicException('DORV1Cars is already set.');
        }
        $this->DORV1Cars = $Cars;

        return $this;
    }

    protected function getDORV1CarMap(): MapInterface
    {
        if (!$this->hasDORV1CarMap()) {
            throw new LogicException('DORV1Cars is not set.');
        }

        return $this->DORV1Cars;
    }

    protected function hasDORV1CarMap(): bool
    {
        return isset($this->DORV1Cars);
    }

    protected function unsetDORV1CarMap(): self
    {
        if (!$this->hasDORV1CarMap()) {
            throw new LogicException('DORV1Cars is not set.');
        }
        unset($this->DORV1Cars);

        return $this;
    }
}
