<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\IntegerMap;

use LogicException;
use Neighborhoods\Buphalo\V1\IntegerMapInterface;

trait AwareTrait
{
    protected $IntegerMap;

    public function setIntegerMap(IntegerMapInterface $IntegerMap): self
    {
        if ($this->hasIntegerMap()) {
            throw new LogicException('IntegerMap is already set.');
        }
        $this->IntegerMap = $IntegerMap;

        return $this;
    }

    protected function getIntegerMap(): IntegerMapInterface
    {
        if (!$this->hasIntegerMap()) {
            throw new LogicException('IntegerMap is not set.');
        }

        return $this->IntegerMap;
    }

    protected function hasIntegerMap(): bool
    {
        return isset($this->IntegerMap);
    }

    protected function unsetIntegerMap(): self
    {
        if (!$this->hasIntegerMap()) {
            throw new LogicException('IntegerMap is not set.');
        }
        unset($this->IntegerMap);

        return $this;
    }
}
