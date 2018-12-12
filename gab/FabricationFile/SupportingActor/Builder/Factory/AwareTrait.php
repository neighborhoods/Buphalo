<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\SupportingActor\Builder\Factory;

use Rhift\BradFab\FabricationFile\SupportingActor\Builder\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorBuilderFactory;

    public function setSupportingActorBuilderFactory(FactoryInterface $SupportingActorBuilderFactory): self
    {
        if ($this->hasSupportingActorBuilderFactory()) {
            throw new \LogicException('SupportingActorBuilderFactory is already set.');
        }
        $this->SupportingActorBuilderFactory = $SupportingActorBuilderFactory;

        return $this;
    }

    protected function getSupportingActorBuilderFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorBuilderFactory()) {
            throw new \LogicException('SupportingActorBuilderFactory is not set.');
        }

        return $this->SupportingActorBuilderFactory;
    }

    protected function hasSupportingActorBuilderFactory(): bool
    {
        return isset($this->SupportingActorBuilderFactory);
    }

    protected function unsetSupportingActorBuilderFactory(): self
    {
        if (!$this->hasSupportingActorBuilderFactory()) {
            throw new \LogicException('SupportingActorBuilderFactory is not set.');
        }
        unset($this->SupportingActorBuilderFactory);

        return $this;
    }
}
