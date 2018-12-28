<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template\Builder\Factory;

use Neighborhoods\Bradfab\SupportingActor\Template\Builder\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateBuilderFactory;

    public function setSupportingActorTemplateBuilderFactory(FactoryInterface $TemplateBuilderFactory): self
    {
        if ($this->hasSupportingActorTemplateBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplateBuilderFactory is already set.');
        }
        $this->SupportingActorTemplateBuilderFactory = $TemplateBuilderFactory;

        return $this;
    }

    protected function getSupportingActorTemplateBuilderFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorTemplateBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplateBuilderFactory is not set.');
        }

        return $this->SupportingActorTemplateBuilderFactory;
    }

    protected function hasSupportingActorTemplateBuilderFactory(): bool
    {
        return isset($this->SupportingActorTemplateBuilderFactory);
    }

    protected function unsetSupportingActorTemplateBuilderFactory(): self
    {
        if (!$this->hasSupportingActorTemplateBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplateBuilderFactory is not set.');
        }
        unset($this->SupportingActorTemplateBuilderFactory);

        return $this;
    }
}
