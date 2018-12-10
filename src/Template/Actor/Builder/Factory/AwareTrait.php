<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor\Builder\Factory;

use Rhift\Bradfab\Template\Actor\Builder\FactoryInterface;

trait AwareTrait
{
    protected $RhiftBradfabTemplateActorBuilderFactory;

    public function setBradfabTemplateActorBuilderFactory(FactoryInterface $bradfabTemplateActorBuilderFactory): self
    {
        if ($this->hasBradfabTemplateActorBuilderFactory()) {
            throw new \LogicException('RhiftBradfabTemplateActorBuilderFactory is already set.');
        }
        $this->RhiftBradfabTemplateActorBuilderFactory = $bradfabTemplateActorBuilderFactory;

        return $this;
    }

    protected function getBradfabTemplateActorBuilderFactory(): FactoryInterface
    {
        if (!$this->hasBradfabTemplateActorBuilderFactory()) {
            throw new \LogicException('RhiftBradfabTemplateActorBuilderFactory is not set.');
        }

        return $this->RhiftBradfabTemplateActorBuilderFactory;
    }

    protected function hasBradfabTemplateActorBuilderFactory(): bool
    {
        return isset($this->RhiftBradfabTemplateActorBuilderFactory);
    }

    protected function unsetBradfabTemplateActorBuilderFactory(): self
    {
        if (!$this->hasBradfabTemplateActorBuilderFactory()) {
            throw new \LogicException('RhiftBradfabTemplateActorBuilderFactory is not set.');
        }
        unset($this->RhiftBradfabTemplateActorBuilderFactory);

        return $this;
    }
}
