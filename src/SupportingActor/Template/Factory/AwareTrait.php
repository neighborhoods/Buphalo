<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Factory;

use Rhift\Bradfab\SupportingActor\Template\FactoryInterface;

trait AwareTrait
{
    protected $SupportingTemplateTemplateFactory;

    public function setTemplateFactory(FactoryInterface $TemplateFactory): self
    {
        if ($this->hasTemplateFactory()) {
            throw new \LogicException('TemplateFactory is already set.');
        }
        $this->SupportingTemplateTemplateFactory = $TemplateFactory;

        return $this;
    }

    protected function getTemplateFactory(): FactoryInterface
    {
        if (!$this->hasTemplateFactory()) {
            throw new \LogicException('TemplateFactory is not set.');
        }

        return $this->SupportingTemplateTemplateFactory;
    }

    protected function hasTemplateFactory(): bool
    {
        return isset($this->SupportingTemplateTemplateFactory);
    }

    protected function unsetTemplateFactory(): self
    {
        if (!$this->hasTemplateFactory()) {
            throw new \LogicException('TemplateFactory is not set.');
        }
        unset($this->SupportingTemplateTemplateFactory);

        return $this;
    }
}
