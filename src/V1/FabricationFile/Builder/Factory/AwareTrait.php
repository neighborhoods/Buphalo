<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile\Builder\Factory;

use LogicException;
use Neighborhoods\Buphalo\V1\FabricationFile\Builder\FactoryInterface;

trait AwareTrait
{
    protected $FabricationFileBuilderFactory;

    public function setFabricationFileBuilderFactory(FactoryInterface $FabricationFileBuilderFactory): self
    {
        if ($this->hasFabricationFileBuilderFactory()) {
            throw new LogicException('FabricationFileBuilderFactory is already set.');
        }
        $this->FabricationFileBuilderFactory = $FabricationFileBuilderFactory;

        return $this;
    }

    protected function getFabricationFileBuilderFactory(): FactoryInterface
    {
        if (!$this->hasFabricationFileBuilderFactory()) {
            throw new LogicException('FabricationFileBuilderFactory is not set.');
        }

        return $this->FabricationFileBuilderFactory;
    }

    protected function hasFabricationFileBuilderFactory(): bool
    {
        return isset($this->FabricationFileBuilderFactory);
    }

    protected function unsetFabricationFileBuilderFactory(): self
    {
        if (!$this->hasFabricationFileBuilderFactory()) {
            throw new LogicException('FabricationFileBuilderFactory is not set.');
        }
        unset($this->FabricationFileBuilderFactory);

        return $this;
    }
}
