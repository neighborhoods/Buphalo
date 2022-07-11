<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Car\Builder\Factory;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Car\Builder\FactoryInterface;

trait AwareTrait
{
    protected $DORVersionCarBuilderFactory;

    public function setDORVersionCarBuilderFactory(FactoryInterface $CarBuilderFactory): self
    {
        if ($this->hasDORVersionCarBuilderFactory()) {
            throw new LogicException('DORVersionCarBuilderFactory is already set.');
        }
        $this->DORVersionCarBuilderFactory = $CarBuilderFactory;

        return $this;
    }

    protected function getDORVersionCarBuilderFactory(): FactoryInterface
    {
        if (!$this->hasDORVersionCarBuilderFactory()) {
            throw new LogicException('DORVersionCarBuilderFactory is not set.');
        }

        return $this->DORVersionCarBuilderFactory;
    }

    protected function hasDORVersionCarBuilderFactory(): bool
    {
        return isset($this->DORVersionCarBuilderFactory);
    }

    protected function unsetDORVersionCarBuilderFactory(): self
    {
        if (!$this->hasDORVersionCarBuilderFactory()) {
            throw new LogicException('DORVersionCarBuilderFactory is not set.');
        }
        unset($this->DORVersionCarBuilderFactory);

        return $this;
    }
}
