<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template\Factory;

use LogicException;
use Neighborhoods\Bradfab\SupportingActor\Template\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateFactory;

    public function setSupportingActorTemplateFactory(FactoryInterface $TemplateFactory): self
    {
        if ($this->hasSupportingActorTemplateFactory()) {
            throw new LogicException('SupportingActorTemplateFactory is already set.');
        }
        $this->SupportingActorTemplateFactory = $TemplateFactory;

        return $this;
    }

    protected function getSupportingActorTemplateFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorTemplateFactory()) {
            throw new LogicException('SupportingActorTemplateFactory is not set.');
        }

        return $this->SupportingActorTemplateFactory;
    }

    protected function hasSupportingActorTemplateFactory(): bool
    {
        return isset($this->SupportingActorTemplateFactory);
    }

    protected function unsetSupportingActorTemplateFactory(): self
    {
        if (!$this->hasSupportingActorTemplateFactory()) {
            throw new LogicException('SupportingActorTemplateFactory is not set.');
        }
        unset($this->SupportingActorTemplateFactory);

        return $this;
    }
}
