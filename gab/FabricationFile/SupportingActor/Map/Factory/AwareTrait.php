<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\SupportingActor\Map\Factory;

use Rhift\Bradfab\FabricationFile\SupportingActor\Map\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorMapFactory;

    public function setSupportingActorMapFactory(FactoryInterface $SupportingActorMapFactory): self
    {
        if ($this->hasSupportingActorMapFactory()) {
            throw new \LogicException('SupportingActorMapFactory is already set.');
        }
        $this->SupportingActorMapFactory = $SupportingActorMapFactory;

        return $this;
    }

    protected function getSupportingActorMapFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorMapFactory()) {
            throw new \LogicException('SupportingActorMapFactory is not set.');
        }

        return $this->SupportingActorMapFactory;
    }

    protected function hasSupportingActorMapFactory(): bool
    {
        return isset($this->SupportingActorMapFactory);
    }

    protected function unsetSupportingActorMapFactory(): self
    {
        if (!$this->hasSupportingActorMapFactory()) {
            throw new \LogicException('SupportingActorMapFactory is not set.');
        }
        unset($this->SupportingActorMapFactory);

        return $this;
    }
}
