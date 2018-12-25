<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template;

use Rhift\Bradfab\SupportingActor\TemplateInterface;

trait AwareTrait
{
    protected $SupportingActorTemplate;

    public function setSupportingActorTemplate(TemplateInterface $Template): self
    {
        if ($this->hasSupportingActorTemplate()) {
            throw new \LogicException('SupportingActorTemplate is already set.');
        }
        $this->SupportingActorTemplate = $Template;

        return $this;
    }

    protected function getSupportingActorTemplate(): TemplateInterface
    {
        if (!$this->hasSupportingActorTemplate()) {
            throw new \LogicException('SupportingActorTemplate is not set.');
        }

        return $this->SupportingActorTemplate;
    }

    protected function hasSupportingActorTemplate(): bool
    {
        return isset($this->SupportingActorTemplate);
    }

    protected function unsetSupportingActorTemplate(): self
    {
        if (!$this->hasSupportingActorTemplate()) {
            throw new \LogicException('SupportingActorTemplate is not set.');
        }
        unset($this->SupportingActorTemplate);

        return $this;
    }
}
