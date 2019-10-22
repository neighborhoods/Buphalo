<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile\Actor\Map\Builder\Factory;

use LogicException;
use Neighborhoods\Buphalo\V1\FabricationFile\Actor\Map\Builder\FactoryInterface;

trait AwareTrait
{
    protected $FabricationFileActorMapBuilderFactory;

    public function setFabricationFileActorMapBuilderFactory(FactoryInterface $FabricationFileActorMapBuilderFactory): self
    {
        if ($this->hasFabricationFileActorMapBuilderFactory()) {
            throw new LogicException('FabricationFileActorMapBuilderFactory is already set.');
        }
        $this->FabricationFileActorMapBuilderFactory = $FabricationFileActorMapBuilderFactory;

        return $this;
    }

    protected function getFabricationFileActorMapBuilderFactory(): FactoryInterface
    {
        if (!$this->hasFabricationFileActorMapBuilderFactory()) {
            throw new LogicException('FabricationFileActorMapBuilderFactory is not set.');
        }

        return $this->FabricationFileActorMapBuilderFactory;
    }

    protected function hasFabricationFileActorMapBuilderFactory(): bool
    {
        return isset($this->FabricationFileActorMapBuilderFactory);
    }

    protected function unsetFabricationFileActorMapBuilderFactory(): self
    {
        if (!$this->hasFabricationFileActorMapBuilderFactory()) {
            throw new LogicException('FabricationFileActorMapBuilderFactory is not set.');
        }
        unset($this->FabricationFileActorMapBuilderFactory);

        return $this;
    }
}
