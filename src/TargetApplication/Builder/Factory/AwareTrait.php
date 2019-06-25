<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetApplication\Builder\Factory;

use LogicException;
use Neighborhoods\Bradfab\TargetApplication\Builder\FactoryInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBradfabTargetApplicationBuilderFactory;

    public function setTargetApplicationBuilderFactory(FactoryInterface $targetApplicationBuilderFactory): self
    {
        if ($this->hasTargetApplicationBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab TargetApplication Builder Factory is already set.');
        }
        $this->NeighborhoodsBradfabTargetApplicationBuilderFactory = $targetApplicationBuilderFactory;

        return $this;
    }

    protected function getTargetApplicationBuilderFactory(): FactoryInterface
    {
        if (!$this->hasTargetApplicationBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab TargetApplication Builder Factory is not set.');
        }

        return $this->NeighborhoodsBradfabTargetApplicationBuilderFactory;
    }

    protected function hasTargetApplicationBuilderFactory(): bool
    {
        return isset($this->NeighborhoodsBradfabTargetApplicationBuilderFactory);
    }

    protected function unsetTargetApplicationBuilderFactory(): self
    {
        if (!$this->hasTargetApplicationBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab TargetApplication Builder Factory is not set.');
        }
        unset($this->NeighborhoodsBradfabTargetApplicationBuilderFactory);

        return $this;
    }
}
