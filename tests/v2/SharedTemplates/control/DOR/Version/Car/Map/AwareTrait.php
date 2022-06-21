<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\Map;

use LogicException;
use Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\MapInterface;

trait AwareTrait
{
    protected $DORVersionCarMap;

    public function setDORVersionCarMap(MapInterface $CarMap): self
    {
        if ($this->hasDORVersionCarMap()) {
            throw new LogicException('DORVersionCarMap is already set.');
        }
        $this->DORVersionCarMap = $CarMap;

        return $this;
    }

    protected function getDORVersionCarMap(): MapInterface
    {
        if (!$this->hasDORVersionCarMap()) {
            throw new LogicException('DORVersionCarMap is not set.');
        }

        return $this->DORVersionCarMap;
    }

    protected function hasDORVersionCarMap(): bool
    {
        return isset($this->DORVersionCarMap);
    }

    protected function unsetDORVersionCarMap(): self
    {
        if (!$this->hasDORVersionCarMap()) {
            throw new LogicException('DORVersionCarMap is not set.');
        }
        unset($this->DORVersionCarMap);

        return $this;
    }
}
