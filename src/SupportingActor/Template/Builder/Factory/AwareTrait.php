<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Builder\Factory;

use Rhift\Bradfab\SupportingActor\Template\Builder\FactoryInterface;

trait AwareTrait
{
    protected $SupportingTemplateTemplateBuilderFactory;

    public function setTemplateBuilderFactory(FactoryInterface $TemplateBuilderFactory): self
    {
        if ($this->hasTemplateBuilderFactory()) {
            throw new \LogicException('TemplateBuilderFactory is already set.');
        }
        $this->SupportingTemplateTemplateBuilderFactory = $TemplateBuilderFactory;

        return $this;
    }

    protected function getTemplateBuilderFactory(): FactoryInterface
    {
        if (!$this->hasTemplateBuilderFactory()) {
            throw new \LogicException('TemplateBuilderFactory is not set.');
        }

        return $this->SupportingTemplateTemplateBuilderFactory;
    }

    protected function hasTemplateBuilderFactory(): bool
    {
        return isset($this->SupportingTemplateTemplateBuilderFactory);
    }

    protected function unsetTemplateBuilderFactory(): self
    {
        if (!$this->hasTemplateBuilderFactory()) {
            throw new \LogicException('TemplateBuilderFactory is not set.');
        }
        unset($this->SupportingTemplateTemplateBuilderFactory);

        return $this;
    }
}
