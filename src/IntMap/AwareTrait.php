<?php
declare(strict_types=1);

namespace Rhift\Bradfab\IntMap;

use Rhift\Bradfab\IntMapInterface;

trait AwareTrait
{
    protected $IntMap;

    public function setIntMap(IntMapInterface $IntMap): self
    {
        if ($this->hasIntMap()) {
            throw new \LogicException('IntMap is already set.');
        }
        $this->IntMap = $IntMap;

        return $this;
    }

    protected function getIntMap(): IntMapInterface
    {
        if (!$this->hasIntMap()) {
            throw new \LogicException('IntMap is not set.');
        }

        return $this->IntMap;
    }

    protected function hasIntMap(): bool
    {
        return isset($this->IntMap);
    }

    protected function unsetIntMap(): self
    {
        if (!$this->hasIntMap()) {
            throw new \LogicException('IntMap is not set.');
        }
        unset($this->IntMap);

        return $this;
    }
}
