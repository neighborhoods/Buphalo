<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\Map\Factory;

use LogicException;
use Neighborhoods\Bradfab\FabricationFile\Map\FactoryInterface;

trait AwareTrait
{
    protected $FabricationFileMapFactory;

    public function setFabricationFileMapFactory(FactoryInterface $FabricationFileMapFactory): self
    {
        if ($this->hasFabricationFileMapFactory()) {
            throw new LogicException('FabricationFileMapFactory is already set.');
        }
        $this->FabricationFileMapFactory = $FabricationFileMapFactory;

        return $this;
    }

    protected function getFabricationFileMapFactory(): FactoryInterface
    {
        if (!$this->hasFabricationFileMapFactory()) {
            throw new LogicException('FabricationFileMapFactory is not set.');
        }

        return $this->FabricationFileMapFactory;
    }

    protected function hasFabricationFileMapFactory(): bool
    {
        return isset($this->FabricationFileMapFactory);
    }

    protected function unsetFabricationFileMapFactory(): self
    {
        if (!$this->hasFabricationFileMapFactory()) {
            throw new LogicException('FabricationFileMapFactory is not set.');
        }
        unset($this->FabricationFileMapFactory);

        return $this;
    }
}
