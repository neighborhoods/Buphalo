<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template;

use Rhift\Bradfab\SupportingActor\TemplateInterface;

trait AwareTrait
{
    protected $SupportingTemplateTemplate;

    public function setTemplate(TemplateInterface $Template): self
    {
        if ($this->hasTemplate()) {
            throw new \LogicException('Template is already set.');
        }
        $this->SupportingTemplateTemplate = $Template;

        return $this;
    }

    protected function getTemplate(): TemplateInterface
    {
        if (!$this->hasTemplate()) {
            throw new \LogicException('Template is not set.');
        }

        return $this->SupportingTemplateTemplate;
    }

    protected function hasTemplate(): bool
    {
        return isset($this->SupportingTemplateTemplate);
    }

    protected function unsetTemplate(): self
    {
        if (!$this->hasTemplate()) {
            throw new \LogicException('Template is not set.');
        }
        unset($this->SupportingTemplateTemplate);

        return $this;
    }
}
