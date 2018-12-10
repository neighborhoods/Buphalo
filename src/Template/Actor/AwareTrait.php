<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor;

use Rhift\Bradfab\Template\ActorInterface;

trait AwareTrait
{
    protected $RhiftBradfabTemplateActor;

    public function setBradfabTemplateActor(ActorInterface $bradfabTemplateActor): self
    {
        if ($this->hasBradfabTemplateActor()) {
            throw new \LogicException('RhiftBradfabTemplateActor is already set.');
        }
        $this->RhiftBradfabTemplateActor = $bradfabTemplateActor;

        return $this;
    }

    protected function getBradfabTemplateActor(): ActorInterface
    {
        if (!$this->hasBradfabTemplateActor()) {
            throw new \LogicException('RhiftBradfabTemplateActor is not set.');
        }

        return $this->RhiftBradfabTemplateActor;
    }

    protected function hasBradfabTemplateActor(): bool
    {
        return isset($this->RhiftBradfabTemplateActor);
    }

    protected function unsetBradfabTemplateActor(): self
    {
        if (!$this->hasBradfabTemplateActor()) {
            throw new \LogicException('RhiftBradfabTemplateActor is not set.');
        }
        unset($this->RhiftBradfabTemplateActor);

        return $this;
    }
}
