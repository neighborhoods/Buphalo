<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor;

use LogicException;
use Neighborhoods\Bradfab\SupportingActorInterface;

trait AwareTrait
{
    protected $Actor;

    public function setSupportingActor(SupportingActorInterface $SupportingActor): self
    {
        if ($this->hasSupportingActor()) {
            throw new LogicException('Supporting Actor is already set.');
        }
        $this->Actor = $SupportingActor;

        return $this;
    }

    protected function getSupportingActor(): SupportingActorInterface
    {
        if (!$this->hasSupportingActor()) {
            throw new LogicException('Supporting Actor is not set.');
        }

        return $this->Actor;
    }

    protected function hasSupportingActor(): bool
    {
        return isset($this->Actor);
    }

    protected function unsetSupportingActor(): self
    {
        if (!$this->hasSupportingActor()) {
            throw new LogicException('Supporting Actor is not set.');
        }
        unset($this->Actor);

        return $this;
    }
}
