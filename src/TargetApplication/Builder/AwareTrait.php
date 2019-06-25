<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetApplication\Builder;

use LogicException;
use Neighborhoods\Bradfab\TargetApplication\BuilderInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBradfabTargetApplicationBuilder;

    public function setTargetApplicationBuilder(BuilderInterface $targetApplicationBuilder): self
    {
        if ($this->hasTargetApplicationBuilder()) {
            throw new LogicException('Neighborhoods Bradfab TargetApplication Builder is already set.');
        }
        $this->NeighborhoodsBradfabTargetApplicationBuilder = $targetApplicationBuilder;

        return $this;
    }

    protected function getTargetApplicationBuilder(): BuilderInterface
    {
        if (!$this->hasTargetApplicationBuilder()) {
            throw new LogicException('Neighborhoods Bradfab TargetApplication Builder is not set.');
        }

        return $this->NeighborhoodsBradfabTargetApplicationBuilder;
    }

    protected function hasTargetApplicationBuilder(): bool
    {
        return isset($this->NeighborhoodsBradfabTargetApplicationBuilder);
    }

    protected function unsetTargetApplicationBuilder(): self
    {
        if (!$this->hasTargetApplicationBuilder()) {
            throw new LogicException('Neighborhoods Bradfab TargetApplication Builder is not set.');
        }
        unset($this->NeighborhoodsBradfabTargetApplicationBuilder);

        return $this;
    }
}
