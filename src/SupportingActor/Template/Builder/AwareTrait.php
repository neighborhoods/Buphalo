<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template\Builder;

use Neighborhoods\Bradfab\SupportingActor\Template\BuilderInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateBuilder;

    public function setSupportingActorTemplateBuilder(BuilderInterface $TemplateBuilder): self
    {
        if ($this->hasSupportingActorTemplateBuilder()) {
            throw new \LogicException('SupportingActorTemplateBuilder is already set.');
        }
        $this->SupportingActorTemplateBuilder = $TemplateBuilder;

        return $this;
    }

    protected function getSupportingActorTemplateBuilder(): BuilderInterface
    {
        if (!$this->hasSupportingActorTemplateBuilder()) {
            throw new \LogicException('SupportingActorTemplateBuilder is not set.');
        }

        return $this->SupportingActorTemplateBuilder;
    }

    protected function hasSupportingActorTemplateBuilder(): bool
    {
        return isset($this->SupportingActorTemplateBuilder);
    }

    protected function unsetSupportingActorTemplateBuilder(): self
    {
        if (!$this->hasSupportingActorTemplateBuilder()) {
            throw new \LogicException('SupportingActorTemplateBuilder is not set.');
        }
        unset($this->SupportingActorTemplateBuilder);

        return $this;
    }
}
