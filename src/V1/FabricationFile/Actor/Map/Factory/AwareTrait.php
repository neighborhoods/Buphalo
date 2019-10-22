<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile\Actor\Map\Factory;

use LogicException;
use Neighborhoods\Buphalo\V1\FabricationFile\Actor\Map\FactoryInterface;

trait AwareTrait
{
    protected $FabricationFileActorMapFactory;

    public function setFabricationFileActorMapFactory(FactoryInterface $FabricationFileActorMapFactory): self
    {
        if ($this->hasFabricationFileActorMapFactory()) {
            throw new LogicException('FabricationFileActorMapFactory is already set.');
        }
        $this->FabricationFileActorMapFactory = $FabricationFileActorMapFactory;

        return $this;
    }

    protected function getFabricationFileActorMapFactory(): FactoryInterface
    {
        if (!$this->hasFabricationFileActorMapFactory()) {
            throw new LogicException('FabricationFileActorMapFactory is not set.');
        }

        return $this->FabricationFileActorMapFactory;
    }

    protected function hasFabricationFileActorMapFactory(): bool
    {
        return isset($this->FabricationFileActorMapFactory);
    }

    protected function unsetFabricationFileActorMapFactory(): self
    {
        if (!$this->hasFabricationFileActorMapFactory()) {
            throw new LogicException('FabricationFileActorMapFactory is not set.');
        }
        unset($this->FabricationFileActorMapFactory);

        return $this;
    }
}
