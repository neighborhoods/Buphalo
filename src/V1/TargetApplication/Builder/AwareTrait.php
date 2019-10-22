<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\TargetApplication\Builder;

use LogicException;
use Neighborhoods\Buphalo\V1\TargetApplication\BuilderInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBuphaloTargetApplicationBuilder;

    public function setTargetApplicationBuilder(BuilderInterface $targetApplicationBuilder): self
    {
        if ($this->hasTargetApplicationBuilder()) {
            throw new LogicException('Neighborhoods Buphalo TargetApplication Builder is already set.');
        }
        $this->NeighborhoodsBuphaloTargetApplicationBuilder = $targetApplicationBuilder;

        return $this;
    }

    protected function getTargetApplicationBuilder(): BuilderInterface
    {
        if (!$this->hasTargetApplicationBuilder()) {
            throw new LogicException('Neighborhoods Buphalo TargetApplication Builder is not set.');
        }

        return $this->NeighborhoodsBuphaloTargetApplicationBuilder;
    }

    protected function hasTargetApplicationBuilder(): bool
    {
        return isset($this->NeighborhoodsBuphaloTargetApplicationBuilder);
    }

    protected function unsetTargetApplicationBuilder(): self
    {
        if (!$this->hasTargetApplicationBuilder()) {
            throw new LogicException('Neighborhoods Buphalo TargetApplication Builder is not set.');
        }
        unset($this->NeighborhoodsBuphaloTargetApplicationBuilder);

        return $this;
    }
}
