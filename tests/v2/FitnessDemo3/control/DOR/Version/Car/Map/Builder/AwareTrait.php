<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Car\Map\Builder;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Car\Map\BuilderInterface;

trait AwareTrait
{
    protected $DORVersionCarMapBuilder;

    public function setDORVersionCarMapBuilder(BuilderInterface $CarMapBuilder): self
    {
        if ($this->hasDORVersionCarMapBuilder()) {
            throw new LogicException('DORVersionCarMapBuilder is already set.');
        }
        $this->DORVersionCarMapBuilder = $CarMapBuilder;

        return $this;
    }

    protected function getDORVersionCarMapBuilder(): BuilderInterface
    {
        if (!$this->hasDORVersionCarMapBuilder()) {
            throw new LogicException('DORVersionCarMapBuilder is not set.');
        }

        return $this->DORVersionCarMapBuilder;
    }

    protected function hasDORVersionCarMapBuilder(): bool
    {
        return isset($this->DORVersionCarMapBuilder);
    }

    protected function unsetDORVersionCarMapBuilder(): self
    {
        if (!$this->hasDORVersionCarMapBuilder()) {
            throw new LogicException('DORVersionCarMapBuilder is not set.');
        }
        unset($this->DORVersionCarMapBuilder);

        return $this;
    }
}
