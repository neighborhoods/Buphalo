<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Car\Builder;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Car\BuilderInterface;

trait AwareTrait
{
    protected $DORVersionCarBuilder;

    public function setDORVersionCarBuilder(BuilderInterface $CarBuilder): self
    {
        if ($this->hasDORVersionCarBuilder()) {
            throw new LogicException('DORVersionCarBuilder is already set.');
        }
        $this->DORVersionCarBuilder = $CarBuilder;

        return $this;
    }

    protected function getDORVersionCarBuilder(): BuilderInterface
    {
        if (!$this->hasDORVersionCarBuilder()) {
            throw new LogicException('DORVersionCarBuilder is not set.');
        }

        return $this->DORVersionCarBuilder;
    }

    protected function hasDORVersionCarBuilder(): bool
    {
        return isset($this->DORVersionCarBuilder);
    }

    protected function unsetDORVersionCarBuilder(): self
    {
        if (!$this->hasDORVersionCarBuilder()) {
            throw new LogicException('DORVersionCarBuilder is not set.');
        }
        unset($this->DORVersionCarBuilder);

        return $this;
    }
}
