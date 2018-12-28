<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

class IntegerMap extends \ArrayIterator implements IntegerMapInterface
{
    /** @param int ...$integer */
    public function __construct(array $integer = array(), int $flags = 0)
    {
        if ($this->count() !== 0) {
            throw new \LogicException('Map is not empty.');
        }

        if (!empty($integer)) {
            $this->assertValidArrayType(...array_values($integer));
        }

        parent::__construct($integer, $flags);
    }

    public function offsetGet($index): int
    {
        return $this->assertValidArrayItemType(parent::offsetGet($index));
    }

    /** @param int $integer */
    public function offsetSet($index, $integer)
    {
        parent::offsetSet($index, $this->assertValidArrayItemType($integer));
    }

    /** @param int $integer */
    public function append($integer)
    {
        $this->assertValidArrayItemType($integer);
        parent::append($integer);
    }

    public function current(): int
    {
        return parent::current();
    }

    protected function assertValidArrayItemType(int $integer)
    {
        return $integer;
    }

    protected function assertValidArrayType(int ...$integers): IntegerMapInterface
    {
        return $this;
    }

    public function getArrayCopy(): IntegerMapInterface
    {
        return new self(parent::getArrayCopy(), (int)$this->getFlags());
    }

    public function toArray(): array
    {
        return (array)$this;
    }

    public function hydrate(array $integers): IntegerMapInterface
    {
        $this->__construct($integers);

        return $this;
    }
}
