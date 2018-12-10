<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor\Builder;

use Rhift\Bradfab\Template\Actor\BuilderInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $RhiftBradfabTemplateActorBuilder;

    public function setBradfabTemplateActorBuilder(BuilderInterface $bradfabTemplateActorBuilder): self
    {
        if ($this->hasBradfabTemplateActorBuilder()) {
            throw new \LogicException('RhiftBradfabTemplateActorBuilder is already set.');
        }
        $this->RhiftBradfabTemplateActorBuilder = $bradfabTemplateActorBuilder;

        return $this;
    }

    protected function getBradfabTemplateActorBuilder(): BuilderInterface
    {
        if (!$this->hasBradfabTemplateActorBuilder()) {
            throw new \LogicException('RhiftBradfabTemplateActorBuilder is not set.');
        }

        return $this->RhiftBradfabTemplateActorBuilder;
    }

    protected function hasBradfabTemplateActorBuilder(): bool
    {
        return isset($this->RhiftBradfabTemplateActorBuilder);
    }

    protected function unsetBradfabTemplateActorBuilder(): self
    {
        if (!$this->hasBradfabTemplateActorBuilder()) {
            throw new \LogicException('RhiftBradfabTemplateActorBuilder is not set.');
        }
        unset($this->RhiftBradfabTemplateActorBuilder);

        return $this;
    }
}
