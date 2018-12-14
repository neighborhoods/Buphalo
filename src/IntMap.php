<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

class IntMap extends \ArrayIterator implements IntMapInterface
{
    /** @param int ...$int */
    public function __construct(array $int = array(), int $flags = 0)
    {
        if ($this->count() !== 0) {
            throw new \LogicException('Map is not empty.');
        }

        if (!empty($int)) {
            $this->assertValidArrayType(...array_values($int));
        }

        parent::__construct($int, $flags);
    }

    public function offsetGet($index): int
    {
        return $this->assertValidArrayItemType(parent::offsetGet($index));
    }

    /** @param int $int */
    public function offsetSet($index, $int)
    {
        parent::offsetSet($index, $this->assertValidArrayItemType($int));
    }

    /** @param int $int */
    public function append($int)
    {
        $this->assertValidArrayItemType($int);
        parent::append($int);
    }

    public function current(): int
    {
        return parent::current();
    }

    protected function assertValidArrayItemType(int $int)
    {
        return $int;
    }

    protected function assertValidArrayType(int ...$ints): IntMapInterface
    {
        return $this;
    }

    public function getArrayCopy(): IntMapInterface
    {
        return new self(parent::getArrayCopy(), (int)$this->getFlags());
    }

    public function toArray(): array
    {
        return (array)$this;
    }

    public function hydrate(array $array): IntMapInterface
    {
        $this->__construct($array);

        return $this;
    }
}
