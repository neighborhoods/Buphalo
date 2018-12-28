<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Fabricator\Factory;

use Neighborhoods\Bradfab\Fabricator\FactoryInterface;

trait AwareTrait
{
    protected $FabricatorFactory;

    public function setFabricatorFactory(FactoryInterface $FabricatorFactory): self
    {
        if ($this->hasFabricatorFactory()) {
            throw new \LogicException('FabricatorFactory is already set.');
        }
        $this->FabricatorFactory = $FabricatorFactory;

        return $this;
    }

    protected function getFabricatorFactory(): FactoryInterface
    {
        if (!$this->hasFabricatorFactory()) {
            throw new \LogicException('FabricatorFactory is not set.');
        }

        return $this->FabricatorFactory;
    }

    protected function hasFabricatorFactory(): bool
    {
        return isset($this->FabricatorFactory);
    }

    protected function unsetFabricatorFactory(): self
    {
        if (!$this->hasFabricatorFactory()) {
            throw new \LogicException('FabricatorFactory is not set.');
        }
        unset($this->FabricatorFactory);

        return $this;
    }
}
