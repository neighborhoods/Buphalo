<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\FabricationFile\Factory;

use LogicException;
use Neighborhoods\Buphalo\V2\FabricationFile\FactoryInterface;

trait AwareTrait
{
    protected $FabricationFileFactory;

    public function setFabricationFileFactory(FactoryInterface $FabricationFileFactory): self
    {
        if ($this->hasFabricationFileFactory()) {
            throw new LogicException('FabricationFileFactory is already set.');
        }
        $this->FabricationFileFactory = $FabricationFileFactory;

        return $this;
    }

    protected function getFabricationFileFactory(): FactoryInterface
    {
        if (!$this->hasFabricationFileFactory()) {
            throw new LogicException('FabricationFileFactory is not set.');
        }

        return $this->FabricationFileFactory;
    }

    protected function hasFabricationFileFactory(): bool
    {
        return isset($this->FabricationFileFactory);
    }

    protected function unsetFabricationFileFactory(): self
    {
        if (!$this->hasFabricationFileFactory()) {
            throw new LogicException('FabricationFileFactory is not set.');
        }
        unset($this->FabricationFileFactory);

        return $this;
    }
}
