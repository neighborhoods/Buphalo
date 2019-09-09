<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\BooleanMap;

use LogicException;
use Neighborhoods\Bradfab\BooleanMapInterface;

trait AwareTrait
{
    protected $BooleanMap;

    public function setBooleanMap(BooleanMapInterface $BooleanMap): self
    {
        if ($this->hasBooleanMap()) {
            throw new LogicException('BooleanMap is already set.');
        }
        $this->BooleanMap = $BooleanMap;

        return $this;
    }

    protected function getBooleanMap(): BooleanMapInterface
    {
        if (!$this->hasBooleanMap()) {
            throw new LogicException('BooleanMap is not set.');
        }

        return $this->BooleanMap;
    }

    protected function hasBooleanMap(): bool
    {
        return isset($this->BooleanMap);
    }

    protected function unsetBooleanMap(): self
    {
        if (!$this->hasBooleanMap()) {
            throw new LogicException('BooleanMap is not set.');
        }
        unset($this->BooleanMap);

        return $this;
    }
}
