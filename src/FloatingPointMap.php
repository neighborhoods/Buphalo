<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

class FloatingPointMap extends \ArrayIterator implements FloatingPointMapInterface
{
    /** @param float ...$floatingPoints */
    public function __construct(array $floatingPoints = array(), int $flags = 0)
    {
        if ($this->count() !== 0) {
            throw new \LogicException('Map is not empty.');
        }

        if (!empty($floatingPoints)) {
            $this->assertValidArrayType(...array_values($floatingPoints));
        }

        parent::__construct($floatingPoints, $flags);
    }

    public function offsetGet($index): float
    {
        return $this->assertValidArrayItemType(parent::offsetGet($index));
    }

    /** @param float $floatingPoint */
    public function offsetSet($index, $floatingPoint)
    {
        parent::offsetSet($index, $this->assertValidArrayItemType($floatingPoint));
    }

    /** @param float $floatingPoint */
    public function append($floatingPoint)
    {
        $this->assertValidArrayItemType($floatingPoint);
        parent::append($floatingPoint);
    }

    public function current(): float
    {
        return parent::current();
    }

    protected function assertValidArrayItemType(float $floatingPoint)
    {
        return $floatingPoint;
    }

    protected function assertValidArrayType(float ...$floatingPoints): FloatingPointMapInterface
    {
        return $this;
    }

    public function getArrayCopy(): FloatingPointMapInterface
    {
        return new self(parent::getArrayCopy(), (int)$this->getFlags());
    }

    public function toArray(): array
    {
        return (array)$this;
    }

    public function hydrate(array $array): FloatingPointMapInterface
    {
        $this->__construct($array);

        return $this;
    }
}
