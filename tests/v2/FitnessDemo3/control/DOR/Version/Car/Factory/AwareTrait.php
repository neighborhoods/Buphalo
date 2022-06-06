<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Car\Factory;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Car\FactoryInterface;

trait AwareTrait
{
    protected $DORVersionCarFactory;

    public function setDORVersionCarFactory(FactoryInterface $CarFactory): self
    {
        if ($this->hasDORVersionCarFactory()) {
            throw new LogicException('DORVersionCarFactory is already set.');
        }
        $this->DORVersionCarFactory = $CarFactory;

        return $this;
    }

    protected function getDORVersionCarFactory(): FactoryInterface
    {
        if (!$this->hasDORVersionCarFactory()) {
            throw new LogicException('DORVersionCarFactory is not set.');
        }

        return $this->DORVersionCarFactory;
    }

    protected function hasDORVersionCarFactory(): bool
    {
        return isset($this->DORVersionCarFactory);
    }

    protected function unsetDORVersionCarFactory(): self
    {
        if (!$this->hasDORVersionCarFactory()) {
            throw new LogicException('DORVersionCarFactory is not set.');
        }
        unset($this->DORVersionCarFactory);

        return $this;
    }
}
