<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor;

use Rhift\Bradfab\Template\ActorInterface;

trait AwareTrait
{
    protected $Actor;

    public function setActor(ActorInterface $Actor): self
    {
        if ($this->Actor()) {
            throw new \LogicException('Actor is already set.');
        }
        $this->Actor = $Actor;

        return $this;
    }

    protected function getActor(): ActorInterface
    {
        if (!$this->Actor()) {
            throw new \LogicException('Actor is not set.');
        }

        return $this->Actor;
    }

    protected function Actor(): bool
    {
        return isset($this->Actor);
    }

    protected function unsetActor(): self
    {
        if (!$this->Actor()) {
            throw new \LogicException('Actor is not set.');
        }
        unset($this->Actor);

        return $this;
    }
}
