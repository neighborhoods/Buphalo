<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\CarInterface;

trait AwareTrait
{
    protected $DORV1Car;

    public function setDORV1Car(CarInterface $Car): self
    {
        if ($this->hasDORV1Car()) {
            throw new LogicException('DORV1Car is already set.');
        }
        $this->DORV1Car = $Car;

        return $this;
    }

    protected function getDORV1Car(): CarInterface
    {
        if (!$this->hasDORV1Car()) {
            throw new LogicException('DORV1Car is not set.');
        }

        return $this->DORV1Car;
    }

    protected function hasDORV1Car(): bool
    {
        return isset($this->DORV1Car);
    }

    protected function unsetDORV1Car(): self
    {
        if (!$this->hasDORV1Car()) {
            throw new LogicException('DORV1Car is not set.');
        }
        unset($this->DORV1Car);

        return $this;
    }
}
