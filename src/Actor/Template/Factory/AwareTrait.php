<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Factory;

use LogicException;
use Neighborhoods\Bradfab\Actor\Template\FactoryInterface;

trait AwareTrait
{
    protected $TargetActorTemplateFactory;

    public function setTargetActorTemplateFactory(FactoryInterface $TemplateFactory): self
    {
        if ($this->hasTargetActorTemplateFactory()) {
            throw new LogicException('TargetActorTemplateFactory is already set.');
        }
        $this->TargetActorTemplateFactory = $TemplateFactory;

        return $this;
    }

    protected function getTargetActorTemplateFactory(): FactoryInterface
    {
        if (!$this->hasTargetActorTemplateFactory()) {
            throw new LogicException('TargetActorTemplateFactory is not set.');
        }

        return $this->TargetActorTemplateFactory;
    }

    protected function hasTargetActorTemplateFactory(): bool
    {
        return isset($this->TargetActorTemplateFactory);
    }

    protected function unsetTargetActorTemplateFactory(): self
    {
        if (!$this->hasTargetActorTemplateFactory()) {
            throw new LogicException('TargetActorTemplateFactory is not set.');
        }
        unset($this->TargetActorTemplateFactory);

        return $this;
    }
}
