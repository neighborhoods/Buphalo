<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor\Map;

use Rhift\Bradfab\Template\Actor\MapInterface;

trait AwareTrait
{
    protected $ActorMap;

    public function setActorMap(MapInterface $ActorMap): self
    {
        if ($this->hasActorMap()) {
            throw new \LogicException('ActorMap is already set.');
        }
        $this->ActorMap = $ActorMap;

        return $this;
    }

    protected function getActorMap(): MapInterface
    {
        if (!$this->hasActorMap()) {
            throw new \LogicException('ActorMap is not set.');
        }

        return $this->ActorMap;
    }

    protected function hasActorMap(): bool
    {
        return isset($this->ActorMap);
    }

    protected function unsetActorMap(): self
    {
        if (!$this->hasActorMap()) {
            throw new \LogicException('ActorMap is not set.');
        }
        unset($this->ActorMap);

        return $this;
    }
}
