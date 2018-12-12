<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\SupportingActor\Factory;

use Rhift\BradFab\FabricationFile\SupportingActor\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorFactory;

    public function setSupportingActorFactory(FactoryInterface $SupportingActorFactory): self
    {
        if ($this->hasSupportingActorFactory()) {
            throw new \LogicException('SupportingActorFactory is already set.');
        }
        $this->SupportingActorFactory = $SupportingActorFactory;

        return $this;
    }

    protected function getSupportingActorFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorFactory()) {
            throw new \LogicException('SupportingActorFactory is not set.');
        }

        return $this->SupportingActorFactory;
    }

    protected function hasSupportingActorFactory(): bool
    {
        return isset($this->SupportingActorFactory);
    }

    protected function unsetSupportingActorFactory(): self
    {
        if (!$this->hasSupportingActorFactory()) {
            throw new \LogicException('SupportingActorFactory is not set.');
        }
        unset($this->SupportingActorFactory);

        return $this;
    }
}
