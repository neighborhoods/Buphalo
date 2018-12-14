<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

class FloatMap extends \ArrayIterator implements FloatMapInterface
{
    /** @param float ...$float */
    public function __construct(array $float = array(), int $flags = 0)
    {
        if ($this->count() !== 0) {
            throw new \LogicException('Map is not empty.');
        }

        if (!empty($float)) {
            $this->assertValidArrayType(...array_values($float));
        }

        parent::__construct($float, $flags);
    }

    public function offsetGet($index): float
    {
        return $this->assertValidArrayItemType(parent::offsetGet($index));
    }

    /** @param float $float */
    public function offsetSet($index, $float)
    {
        parent::offsetSet($index, $this->assertValidArrayItemType($float));
    }

    /** @param float $float */
    public function append($float)
    {
        $this->assertValidArrayItemType($float);
        parent::append($float);
    }

    public function current(): float
    {
        return parent::current();
    }

    protected function assertValidArrayItemType(float $float)
    {
        return $float;
    }

    protected function assertValidArrayType(float ...$floats): FloatMapInterface
    {
        return $this;
    }

    public function getArrayCopy(): FloatMapInterface
    {
        return new self(parent::getArrayCopy(), (int)$this->getFlags());
    }

    public function toArray(): array
    {
        return (array)$this;
    }

    public function hydrate(array $array): FloatMapInterface
    {
        $this->__construct($array);

        return $this;
    }
}
