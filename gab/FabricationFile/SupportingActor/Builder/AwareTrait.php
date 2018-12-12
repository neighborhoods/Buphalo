<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\SupportingActor\Builder;

use Rhift\BradFab\FabricationFile\SupportingActor\BuilderInterface;

trait AwareTrait
{
    protected $SupportingActorBuilder;

    public function setSupportingActorBuilder(BuilderInterface $SupportingActorBuilder): self
    {
        if ($this->hasSupportingActorBuilder()) {
            throw new \LogicException('SupportingActorBuilder is already set.');
        }
        $this->SupportingActorBuilder = $SupportingActorBuilder;

        return $this;
    }

    protected function getSupportingActorBuilder(): BuilderInterface
    {
        if (!$this->hasSupportingActorBuilder()) {
            throw new \LogicException('SupportingActorBuilder is not set.');
        }

        return $this->SupportingActorBuilder;
    }

    protected function hasSupportingActorBuilder(): bool
    {
        return isset($this->SupportingActorBuilder);
    }

    protected function unsetSupportingActorBuilder(): self
    {
        if (!$this->hasSupportingActorBuilder()) {
            throw new \LogicException('SupportingActorBuilder is not set.');
        }
        unset($this->SupportingActorBuilder);

        return $this;
    }
}
