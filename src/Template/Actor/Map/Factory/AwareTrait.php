<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor\Map\Factory;

use Rhift\Bradfab\Template\Actor\Map\FactoryInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $RhiftBradfabTemplateActorMapFactory;

    public function setBradfabTemplateActorMapFactory(FactoryInterface $bradfabTemplateActorMapFactory): self
    {
        if ($this->hasBradfabTemplateActorMapFactory()) {
            throw new \LogicException('RhiftBradfabTemplateActorMapFactory is already set.');
        }
        $this->RhiftBradfabTemplateActorMapFactory = $bradfabTemplateActorMapFactory;

        return $this;
    }

    protected function getBradfabTemplateActorMapFactory(): FactoryInterface
    {
        if (!$this->hasBradfabTemplateActorMapFactory()) {
            throw new \LogicException('RhiftBradfabTemplateActorMapFactory is not set.');
        }

        return $this->RhiftBradfabTemplateActorMapFactory;
    }

    protected function hasBradfabTemplateActorMapFactory(): bool
    {
        return isset($this->RhiftBradfabTemplateActorMapFactory);
    }

    protected function unsetBradfabTemplateActorMapFactory(): self
    {
        if (!$this->hasBradfabTemplateActorMapFactory()) {
            throw new \LogicException('RhiftBradfabTemplateActorMapFactory is not set.');
        }
        unset($this->RhiftBradfabTemplateActorMapFactory);

        return $this;
    }
}
