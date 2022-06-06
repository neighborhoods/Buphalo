<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Car;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\CarInterface;

trait AwareTrait
{
    protected $DORVersionCar;

    public function setDORVersionCar(CarInterface $Car): self
    {
        if ($this->hasDORVersionCar()) {
            throw new LogicException('DORVersionCar is already set.');
        }
        $this->DORVersionCar = $Car;

        return $this;
    }

    protected function getDORVersionCar(): CarInterface
    {
        if (!$this->hasDORVersionCar()) {
            throw new LogicException('DORVersionCar is not set.');
        }

        return $this->DORVersionCar;
    }

    protected function hasDORVersionCar(): bool
    {
        return isset($this->DORVersionCar);
    }

    protected function unsetDORVersionCar(): self
    {
        if (!$this->hasDORVersionCar()) {
            throw new LogicException('DORVersionCar is not set.');
        }
        unset($this->DORVersionCar);

        return $this;
    }
}
