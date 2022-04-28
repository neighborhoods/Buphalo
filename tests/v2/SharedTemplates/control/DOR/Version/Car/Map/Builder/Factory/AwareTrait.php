<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\Map\Builder\Factory;

use LogicException;
use Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\Map\Builder\FactoryInterface;

trait AwareTrait
{
    protected $DORVersionCarMapBuilderFactory;

    public function setDORVersionCarMapBuilderFactory(FactoryInterface $CarMapBuilderFactory): self
    {
        if ($this->hasDORVersionCarMapBuilderFactory()) {
            throw new LogicException('DORVersionCarMapBuilderFactory is already set.');
        }
        $this->DORVersionCarMapBuilderFactory = $CarMapBuilderFactory;

        return $this;
    }

    protected function getDORVersionCarMapBuilderFactory(): FactoryInterface
    {
        if (!$this->hasDORVersionCarMapBuilderFactory()) {
            throw new LogicException('DORVersionCarMapBuilderFactory is not set.');
        }

        return $this->DORVersionCarMapBuilderFactory;
    }

    protected function hasDORVersionCarMapBuilderFactory(): bool
    {
        return isset($this->DORVersionCarMapBuilderFactory);
    }

    protected function unsetDORVersionCarMapBuilderFactory(): self
    {
        if (!$this->hasDORVersionCarMapBuilderFactory()) {
            throw new LogicException('DORVersionCarMapBuilderFactory is not set.');
        }
        unset($this->DORVersionCarMapBuilderFactory);

        return $this;
    }
}
