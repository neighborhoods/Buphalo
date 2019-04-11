<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\Actor\Builder;

use LogicException;
use Neighborhoods\Bradfab\FabricationFile\Actor\BuilderInterface;

trait AwareTrait
{
    protected $FabricationFileActorBuilder;

    public function setFabricationFileActorBuilder(BuilderInterface $FabricationFileActorBuilder): self
    {
        if ($this->hasFabricationFileActorBuilder()) {
            throw new LogicException('FabricationFileActorBuilder is already set.');
        }
        $this->FabricationFileActorBuilder = $FabricationFileActorBuilder;

        return $this;
    }

    protected function getFabricationFileActorBuilder(): BuilderInterface
    {
        if (!$this->hasFabricationFileActorBuilder()) {
            throw new LogicException('FabricationFileActorBuilder is not set.');
        }

        return $this->FabricationFileActorBuilder;
    }

    protected function hasFabricationFileActorBuilder(): bool
    {
        return isset($this->FabricationFileActorBuilder);
    }

    protected function unsetFabricationFileActorBuilder(): self
    {
        if (!$this->hasFabricationFileActorBuilder()) {
            throw new LogicException('FabricationFileActorBuilder is not set.');
        }
        unset($this->FabricationFileActorBuilder);

        return $this;
    }
}
