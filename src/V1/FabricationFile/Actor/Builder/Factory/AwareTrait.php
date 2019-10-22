<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile\Actor\Builder\Factory;

use LogicException;
use Neighborhoods\Buphalo\V1\FabricationFile\Actor\Builder\FactoryInterface;

trait AwareTrait
{
    protected $FabricationFileActorBuilderFactory;

    public function setFabricationFileActorBuilderFactory(FactoryInterface $FabricationFileActorBuilderFactory): self
    {
        if ($this->hasFabricationFileActorBuilderFactory()) {
            throw new LogicException('FabricationFileActorBuilderFactory is already set.');
        }
        $this->FabricationFileActorBuilderFactory = $FabricationFileActorBuilderFactory;

        return $this;
    }

    protected function getFabricationFileActorBuilderFactory(): FactoryInterface
    {
        if (!$this->hasFabricationFileActorBuilderFactory()) {
            throw new LogicException('FabricationFileActorBuilderFactory is not set.');
        }

        return $this->FabricationFileActorBuilderFactory;
    }

    protected function hasFabricationFileActorBuilderFactory(): bool
    {
        return isset($this->FabricationFileActorBuilderFactory);
    }

    protected function unsetFabricationFileActorBuilderFactory(): self
    {
        if (!$this->hasFabricationFileActorBuilderFactory()) {
            throw new LogicException('FabricationFileActorBuilderFactory is not set.');
        }
        unset($this->FabricationFileActorBuilderFactory);

        return $this;
    }
}
