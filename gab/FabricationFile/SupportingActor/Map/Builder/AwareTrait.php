<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\SupportingActor\Map\Builder;

use Rhift\BradFab\FabricationFile\SupportingActor\Map\BuilderInterface;

trait AwareTrait
{
    protected $SupportingActorMapBuilder;

    public function setSupportingActorMapBuilder(BuilderInterface $SupportingActorMapBuilder): self
    {
        if ($this->hasSupportingActorMapBuilder()) {
            throw new \LogicException('SupportingActorMapBuilder is already set.');
        }
        $this->SupportingActorMapBuilder = $SupportingActorMapBuilder;

        return $this;
    }

    protected function getSupportingActorMapBuilder(): BuilderInterface
    {
        if (!$this->hasSupportingActorMapBuilder()) {
            throw new \LogicException('SupportingActorMapBuilder is not set.');
        }

        return $this->SupportingActorMapBuilder;
    }

    protected function hasSupportingActorMapBuilder(): bool
    {
        return isset($this->SupportingActorMapBuilder);
    }

    protected function unsetSupportingActorMapBuilder(): self
    {
        if (!$this->hasSupportingActorMapBuilder()) {
            throw new \LogicException('SupportingActorMapBuilder is not set.');
        }
        unset($this->SupportingActorMapBuilder);

        return $this;
    }
}
