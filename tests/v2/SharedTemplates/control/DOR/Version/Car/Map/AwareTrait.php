<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\Map;

use LogicException;
use Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\MapInterface;

trait AwareTrait
{
    protected $DORVersionCars;

    public function setDORVersionCarMap(MapInterface $Cars): self
    {
        if ($this->hasDORVersionCarMap()) {
            throw new LogicException('DORVersionCars is already set.');
        }
        $this->DORVersionCars = $Cars;

        return $this;
    }

    protected function getDORVersionCarMap(): MapInterface
    {
        if (!$this->hasDORVersionCarMap()) {
            throw new LogicException('DORVersionCars is not set.');
        }

        return $this->DORVersionCars;
    }

    protected function hasDORVersionCarMap(): bool
    {
        return isset($this->DORVersionCars);
    }

    protected function unsetDORVersionCarMap(): self
    {
        if (!$this->hasDORVersionCarMap()) {
            throw new LogicException('DORVersionCars is not set.');
        }
        unset($this->DORVersionCars);

        return $this;
    }
}
