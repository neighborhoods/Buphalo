<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Factory;

use LogicException;
use Neighborhoods\Bradfab\Actor\Template\FactoryInterface;

trait AwareTrait
{
    protected $ActorTemplateFactory;

    public function setActorTemplateFactory(FactoryInterface $TemplateFactory): self
    {
        if ($this->hasActorTemplateFactory()) {
            throw new LogicException('ActorTemplateFactory is already set.');
        }
        $this->ActorTemplateFactory = $TemplateFactory;

        return $this;
    }

    protected function getActorTemplateFactory(): FactoryInterface
    {
        if (!$this->hasActorTemplateFactory()) {
            throw new LogicException('ActorTemplateFactory is not set.');
        }

        return $this->ActorTemplateFactory;
    }

    protected function hasActorTemplateFactory(): bool
    {
        return isset($this->ActorTemplateFactory);
    }

    protected function unsetActorTemplateFactory(): self
    {
        if (!$this->hasActorTemplateFactory()) {
            throw new LogicException('ActorTemplateFactory is not set.');
        }
        unset($this->ActorTemplateFactory);

        return $this;
    }
}
