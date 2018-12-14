<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FloatMap;

use Rhift\Bradfab\FloatMapInterface;

trait AwareTrait
{
    protected $FloatMap;

    public function setFloatMap(FloatMapInterface $FloatMap): self
    {
        if ($this->hasFloatMap()) {
            throw new \LogicException('FloatMap is already set.');
        }
        $this->FloatMap = $FloatMap;

        return $this;
    }

    protected function getFloatMap(): FloatMapInterface
    {
        if (!$this->hasFloatMap()) {
            throw new \LogicException('FloatMap is not set.');
        }

        return $this->FloatMap;
    }

    protected function hasFloatMap(): bool
    {
        return isset($this->FloatMap);
    }

    protected function unsetFloatMap(): self
    {
        if (!$this->hasFloatMap()) {
            throw new \LogicException('FloatMap is not set.');
        }
        unset($this->FloatMap);

        return $this;
    }
}
