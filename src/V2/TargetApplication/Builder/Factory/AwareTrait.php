<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\TargetApplication\Builder\Factory;

use LogicException;
use Neighborhoods\Buphalo\V2\TargetApplication\Builder\FactoryInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBuphaloTargetApplicationBuilderFactory;

    public function setTargetApplicationBuilderFactory(FactoryInterface $targetApplicationBuilderFactory): self
    {
        if ($this->hasTargetApplicationBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo TargetApplication Builder Factory is already set.');
        }
        $this->NeighborhoodsBuphaloTargetApplicationBuilderFactory = $targetApplicationBuilderFactory;

        return $this;
    }

    protected function getTargetApplicationBuilderFactory(): FactoryInterface
    {
        if (!$this->hasTargetApplicationBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo TargetApplication Builder Factory is not set.');
        }

        return $this->NeighborhoodsBuphaloTargetApplicationBuilderFactory;
    }

    protected function hasTargetApplicationBuilderFactory(): bool
    {
        return isset($this->NeighborhoodsBuphaloTargetApplicationBuilderFactory);
    }

    protected function unsetTargetApplicationBuilderFactory(): self
    {
        if (!$this->hasTargetApplicationBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo TargetApplication Builder Factory is not set.');
        }
        unset($this->NeighborhoodsBuphaloTargetApplicationBuilderFactory);

        return $this;
    }
}
