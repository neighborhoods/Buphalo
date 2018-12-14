<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Builder;

use Rhift\Bradfab\SupportingActor\Template\BuilderInterface;

trait AwareTrait
{
    protected $SupportingTemplateTemplateBuilder;

    public function setTemplateBuilder(BuilderInterface $TemplateBuilder): self
    {
        if ($this->hasTemplateBuilder()) {
            throw new \LogicException('TemplateBuilder is already set.');
        }
        $this->SupportingTemplateTemplateBuilder = $TemplateBuilder;

        return $this;
    }

    protected function getTemplateBuilder(): BuilderInterface
    {
        if (!$this->hasTemplateBuilder()) {
            throw new \LogicException('TemplateBuilder is not set.');
        }

        return $this->SupportingTemplateTemplateBuilder;
    }

    protected function hasTemplateBuilder(): bool
    {
        return isset($this->SupportingTemplateTemplateBuilder);
    }

    protected function unsetTemplateBuilder(): self
    {
        if (!$this->hasTemplateBuilder()) {
            throw new \LogicException('TemplateBuilder is not set.');
        }
        unset($this->SupportingTemplateTemplateBuilder);

        return $this;
    }
}
