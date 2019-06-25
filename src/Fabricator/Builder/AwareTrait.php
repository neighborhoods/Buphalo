<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Fabricator\Builder;

use LogicException;
use Neighborhoods\Bradfab\Fabricator\BuilderInterface;

trait AwareTrait
{
    protected $NeighborhoodsBradfabFabricatorBuilder;

    public function setFabricatorBuilder(BuilderInterface $fabricatorBuilder): self
    {
        if ($this->hasFabricatorBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Fabricator Builder is already set.');
        }
        $this->NeighborhoodsBradfabFabricatorBuilder = $fabricatorBuilder;

        return $this;
    }

    protected function getFabricatorBuilder(): BuilderInterface
    {
        if (!$this->hasFabricatorBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Fabricator Builder is not set.');
        }

        return $this->NeighborhoodsBradfabFabricatorBuilder;
    }

    protected function hasFabricatorBuilder(): bool
    {
        return isset($this->NeighborhoodsBradfabFabricatorBuilder);
    }

    protected function unsetFabricatorBuilder(): self
    {
        if (!$this->hasFabricatorBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Fabricator Builder is not set.');
        }
        unset($this->NeighborhoodsBradfabFabricatorBuilder);

        return $this;
    }
}
