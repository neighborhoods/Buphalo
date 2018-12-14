<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

class StringMap extends \ArrayIterator implements StringMapInterface
{
    /** @param string ...$Strings */
    public function __construct(array $Strings = array(), int $flags = 0)
    {
        if ($this->count() !== 0) {
            throw new \LogicException('Map is not empty.');
        }

        if (!empty($Strings)) {
            $this->assertValidArrayType(...array_values($Strings));
        }

        parent::__construct($Strings, $flags);
    }

    public function offsetGet($index): string
    {
        return $this->assertValidArrayItemType(parent::offsetGet($index));
    }

    /** @param string $string */
    public function offsetSet($index, $string)
    {
        parent::offsetSet($index, $this->assertValidArrayItemType($string));
    }

    /** @param string $string */
    public function append($string)
    {
        $this->assertValidArrayItemType($string);
        parent::append($string);
    }

    public function current(): string
    {
        return parent::current();
    }

    protected function assertValidArrayItemType(string $string)
    {
        return $string;
    }

    protected function assertValidArrayType(string ...$strings): StringMapInterface
    {
        return $this;
    }

    public function getArrayCopy(): StringMapInterface
    {
        return new self(parent::getArrayCopy(), (int)$this->getFlags());
    }

    public function toArray(): array
    {
        return (array)$this;
    }

    /** @param string ...$Strings */
    public function hydrate(array $Strings): StringMapInterface
    {
        $this->__construct($Strings);

        return $this;
    }
}
