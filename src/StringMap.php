<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

class StringMap extends \ArrayIterator implements StringMapInterface
{
    /** @param string ...$string */
    public function __construct(array $string = array(), int $flags = 0)
    {
        if ($this->count() !== 0) {
            throw new \LogicException('Map is not empty.');
        }

        if (!empty($string)) {
            $this->assertValidArrayType(...array_values($string));
        }

        parent::__construct($string, $flags);
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

    public function hydrate(array $array): StringMapInterface
    {
        $this->__construct($array);

        return $this;
    }
}
