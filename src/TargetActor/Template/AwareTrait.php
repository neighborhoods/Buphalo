<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template;

use Neighborhoods\Bradfab\TargetActor\TemplateInterface;

trait AwareTrait
{
    protected $TargetActorTemplate;

    public function setTargetActorTemplate(TemplateInterface $Template): self
    {
        if ($this->hasTargetActorTemplate()) {
            throw new \LogicException('TargetActorTemplate is already set.');
        }
        $this->TargetActorTemplate = $Template;

        return $this;
    }

    protected function getTargetActorTemplate(): TemplateInterface
    {
        if (!$this->hasTargetActorTemplate()) {
            throw new \LogicException('TargetActorTemplate is not set.');
        }

        return $this->TargetActorTemplate;
    }

    protected function hasTargetActorTemplate(): bool
    {
        return isset($this->TargetActorTemplate);
    }

    protected function unsetTargetActorTemplate(): self
    {
        if (!$this->hasTargetActorTemplate()) {
            throw new \LogicException('TargetActorTemplate is not set.');
        }
        unset($this->TargetActorTemplate);

        return $this;
    }
}
