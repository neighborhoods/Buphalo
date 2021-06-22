<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Fabricator\Builder;

use LogicException;
use Neighborhoods\Buphalo\V2\Fabricator\BuilderInterface;

trait AwareTrait
{
    protected $NeighborhoodsBuphaloFabricatorBuilder;

    public function setFabricatorBuilder(BuilderInterface $fabricatorBuilder): self
    {
        if ($this->hasFabricatorBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Fabricator Builder is already set.');
        }
        $this->NeighborhoodsBuphaloFabricatorBuilder = $fabricatorBuilder;

        return $this;
    }

    protected function getFabricatorBuilder(): BuilderInterface
    {
        if (!$this->hasFabricatorBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Fabricator Builder is not set.');
        }

        return $this->NeighborhoodsBuphaloFabricatorBuilder;
    }

    protected function hasFabricatorBuilder(): bool
    {
        return isset($this->NeighborhoodsBuphaloFabricatorBuilder);
    }

    protected function unsetFabricatorBuilder(): self
    {
        if (!$this->hasFabricatorBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Fabricator Builder is not set.');
        }
        unset($this->NeighborhoodsBuphaloFabricatorBuilder);

        return $this;
    }
}
