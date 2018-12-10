<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor\Map;

use Rhift\Bradfab\Template\Actor\MapInterface;

trait AwareTrait
{
    protected $RhiftBradfabTemplateActorMap;

    public function setBradfabTemplateActorMap(MapInterface $bradfabTemplateActorMap): self
    {
        if ($this->hasBradfabTemplateActorMap()) {
            throw new \LogicException('RhiftBradfabTemplateActorMap is already set.');
        }
        $this->RhiftBradfabTemplateActorMap = $bradfabTemplateActorMap;

        return $this;
    }

    protected function getBradfabTemplateActorMap(): MapInterface
    {
        if (!$this->hasBradfabTemplateActorMap()) {
            throw new \LogicException('RhiftBradfabTemplateActorMap is not set.');
        }

        return $this->RhiftBradfabTemplateActorMap;
    }

    protected function hasBradfabTemplateActorMap(): bool
    {
        return isset($this->RhiftBradfabTemplateActorMap);
    }

    protected function unsetBradfabTemplateActorMap(): self
    {
        if (!$this->hasBradfabTemplateActorMap()) {
            throw new \LogicException('RhiftBradfabTemplateActorMap is not set.');
        }
        unset($this->RhiftBradfabTemplateActorMap);

        return $this;
    }
}
