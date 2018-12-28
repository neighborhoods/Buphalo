<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\StringMap;

use Neighborhoods\Bradfab\StringMapInterface;

trait AwareTrait
{
    protected $StringMap;

    public function setStringMap(StringMapInterface $StringMap): self
    {
        if ($this->hasStringMap()) {
            throw new \LogicException('StringMap is already set.');
        }
        $this->StringMap = $StringMap;

        return $this;
    }

    protected function getStringMap(): StringMapInterface
    {
        if (!$this->hasStringMap()) {
            throw new \LogicException('StringMap is not set.');
        }

        return $this->StringMap;
    }

    protected function hasStringMap(): bool
    {
        return isset($this->StringMap);
    }

    protected function unsetStringMap(): self
    {
        if (!$this->hasStringMap()) {
            throw new \LogicException('StringMap is not set.');
        }
        unset($this->StringMap);

        return $this;
    }
}
