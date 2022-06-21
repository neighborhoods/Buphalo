<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\Map\Factory;

use LogicException;
use Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\Map\FactoryInterface;

trait AwareTrait
{
    protected $DORVersionCarMapFactory;

    public function setDORVersionCarMapFactory(FactoryInterface $CarMapFactory): self
    {
        if ($this->hasDORVersionCarMapFactory()) {
            throw new LogicException('DORVersionCarMapFactory is already set.');
        }
        $this->DORVersionCarMapFactory = $CarMapFactory;

        return $this;
    }

    protected function getDORVersionCarMapFactory(): FactoryInterface
    {
        if (!$this->hasDORVersionCarMapFactory()) {
            throw new LogicException('DORVersionCarMapFactory is not set.');
        }

        return $this->DORVersionCarMapFactory;
    }

    protected function hasDORVersionCarMapFactory(): bool
    {
        return isset($this->DORVersionCarMapFactory);
    }

    protected function unsetDORVersionCarMapFactory(): self
    {
        if (!$this->hasDORVersionCarMapFactory()) {
            throw new LogicException('DORVersionCarMapFactory is not set.');
        }
        unset($this->DORVersionCarMapFactory);

        return $this;
    }
}
