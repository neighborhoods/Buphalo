<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor\Factory;

use Rhift\Bradfab\Template\Actor\FactoryInterface;

trait AwareTrait
{
    protected $RhiftBradfabTemplateActorFactory;

    public function setBradfabTemplateActorFactory(FactoryInterface $bradfabTemplateActorFactory): self
    {
        if ($this->hasBradfabTemplateActorFactory()) {
            throw new \LogicException('RhiftBradfabTemplateActorFactory is already set.');
        }
        $this->RhiftBradfabTemplateActorFactory = $bradfabTemplateActorFactory;

        return $this;
    }

    protected function getBradfabTemplateActorFactory(): FactoryInterface
    {
        if (!$this->hasBradfabTemplateActorFactory()) {
            throw new \LogicException('RhiftBradfabTemplateActorFactory is not set.');
        }

        return $this->RhiftBradfabTemplateActorFactory;
    }

    protected function hasBradfabTemplateActorFactory(): bool
    {
        return isset($this->RhiftBradfabTemplateActorFactory);
    }

    protected function unsetBradfabTemplateActorFactory(): self
    {
        if (!$this->hasBradfabTemplateActorFactory()) {
            throw new \LogicException('RhiftBradfabTemplateActorFactory is not set.');
        }
        unset($this->RhiftBradfabTemplateActorFactory);

        return $this;
    }
}
