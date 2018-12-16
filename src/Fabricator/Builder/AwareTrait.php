<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Fabricator\Builder;

use Rhift\Bradfab\Fabricator\BuilderInterface;

trait AwareTrait
{
    protected $FabricatorBuilder;

    public function setFabricatorBuilder(BuilderInterface $FabricatorBuilder): self
    {
        if ($this->hasFabricatorBuilder()) {
            throw new \LogicException('FabricatorBuilder is already set.');
        }
        $this->FabricatorBuilder = $FabricatorBuilder;

        return $this;
    }

    protected function getFabricatorBuilder(): BuilderInterface
    {
        if (!$this->hasFabricatorBuilder()) {
            throw new \LogicException('FabricatorBuilder is not set.');
        }

        return $this->FabricatorBuilder;
    }

    protected function hasFabricatorBuilder(): bool
    {
        return isset($this->FabricatorBuilder);
    }

    protected function unsetFabricatorBuilder(): self
    {
        if (!$this->hasFabricatorBuilder()) {
            throw new \LogicException('FabricatorBuilder is not set.');
        }
        unset($this->FabricatorBuilder);

        return $this;
    }
}
