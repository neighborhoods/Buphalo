<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1;

use ArrayIterator;
use LogicException;

class StringMap extends ArrayIterator implements StringMapInterface
{
    /** @param string ...$Actors */
    public function __construct(array $Actors = array(), int $flags = 0)
    {
        if ($this->count() !== 0) {
            throw new LogicException('Map is not empty.');
        }

        if (!empty($Actors)) {
            $this->assertValidArrayType(...array_values($Actors));
        }

        parent::__construct($Actors, $flags);
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

    protected function assertValidArrayType(
        /** @noinspection PhpUnusedParameterInspection */
        string ...$strings
    ): StringMapInterface {
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
