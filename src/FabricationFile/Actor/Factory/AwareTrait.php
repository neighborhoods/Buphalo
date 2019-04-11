<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\Actor\Factory;

use LogicException;
use Neighborhoods\Bradfab\FabricationFile\Actor\FactoryInterface;

trait AwareTrait
{
    protected $FabricationFileActorFactory;

    public function setFabricationFileActorFactory(FactoryInterface $FabricationFileActorFactory): self
    {
        if ($this->hasFabricationFileActorFactory()) {
            throw new LogicException('FabricationFileActorFactory is already set.');
        }
        $this->FabricationFileActorFactory = $FabricationFileActorFactory;

        return $this;
    }

    protected function getFabricationFileActorFactory(): FactoryInterface
    {
        if (!$this->hasFabricationFileActorFactory()) {
            throw new LogicException('FabricationFileActorFactory is not set.');
        }

        return $this->FabricationFileActorFactory;
    }

    protected function hasFabricationFileActorFactory(): bool
    {
        return isset($this->FabricationFileActorFactory);
    }

    protected function unsetFabricationFileActorFactory(): self
    {
        if (!$this->hasFabricationFileActorFactory()) {
            throw new LogicException('FabricationFileActorFactory is not set.');
        }
        unset($this->FabricationFileActorFactory);

        return $this;
    }
}
