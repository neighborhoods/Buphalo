<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\SupportingActor\Map\Builder\Factory;

use Rhift\Bradfab\FabricationFile\SupportingActor\Map\Builder\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorMapBuilderFactory;

    public function setSupportingActorMapBuilderFactory(FactoryInterface $SupportingActorMapBuilderFactory): self
    {
        if ($this->hasSupportingActorMapBuilderFactory()) {
            throw new \LogicException('SupportingActorMapBuilderFactory is already set.');
        }
        $this->SupportingActorMapBuilderFactory = $SupportingActorMapBuilderFactory;

        return $this;
    }

    protected function getSupportingActorMapBuilderFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorMapBuilderFactory()) {
            throw new \LogicException('SupportingActorMapBuilderFactory is not set.');
        }

        return $this->SupportingActorMapBuilderFactory;
    }

    protected function hasSupportingActorMapBuilderFactory(): bool
    {
        return isset($this->SupportingActorMapBuilderFactory);
    }

    protected function unsetSupportingActorMapBuilderFactory(): self
    {
        if (!$this->hasSupportingActorMapBuilderFactory()) {
            throw new \LogicException('SupportingActorMapBuilderFactory is not set.');
        }
        unset($this->SupportingActorMapBuilderFactory);

        return $this;
    }
}
