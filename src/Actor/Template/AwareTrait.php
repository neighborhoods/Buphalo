<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template;

use LogicException;
use Neighborhoods\Buphalo\Actor\TemplateInterface;

trait AwareTrait
{
    protected $ActorTemplate;

    public function setActorTemplate(TemplateInterface $Template): self
    {
        if ($this->hasActorTemplate()) {
            throw new LogicException('ActorTemplate is already set.');
        }
        $this->ActorTemplate = $Template;

        return $this;
    }

    protected function getActorTemplate(): TemplateInterface
    {
        if (!$this->hasActorTemplate()) {
            throw new LogicException('ActorTemplate is not set.');
        }

        return $this->ActorTemplate;
    }

    protected function hasActorTemplate(): bool
    {
        return isset($this->ActorTemplate);
    }

    protected function unsetActorTemplate(): self
    {
        if (!$this->hasActorTemplate()) {
            throw new LogicException('ActorTemplate is not set.');
        }
        unset($this->ActorTemplate);

        return $this;
    }
}
