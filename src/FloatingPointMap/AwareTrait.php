<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FloatingPointMap;

use Neighborhoods\Bradfab\FloatingPointMapInterface;

trait AwareTrait
{
    protected $FloatingPointMap;

    public function setFloatingPointMap(FloatingPointMapInterface $FloatingPointMap): self
    {
        if ($this->hasFloatingPointMap()) {
            throw new \LogicException('FloatingPointMap is already set.');
        }
        $this->FloatingPointMap = $FloatingPointMap;

        return $this;
    }

    protected function getFloatingPointMap(): FloatingPointMapInterface
    {
        if (!$this->hasFloatingPointMap()) {
            throw new \LogicException('FloatingPointMap is not set.');
        }

        return $this->FloatingPointMap;
    }

    protected function hasFloatingPointMap(): bool
    {
        return isset($this->FloatingPointMap);
    }

    protected function unsetFloatingPointMap(): self
    {
        if (!$this->hasFloatingPointMap()) {
            throw new \LogicException('FloatingPointMap is not set.');
        }
        unset($this->FloatingPointMap);

        return $this;
    }
}
