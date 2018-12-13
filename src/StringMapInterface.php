<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

interface StringMapInterface extends \SeekableIterator, \ArrayAccess, \Serializable, \Countable
{
    /** @param string ...$string */
    public function __construct(array $string = array(), int $flags = 0);

    public function offsetGet($index): string;

    /** @param string $string */
    public function offsetSet($index, $string);

    /** @param string $string */
    public function append($string);

    public function current(): string;

    public function getArrayCopy(): StringMapInterface;

    public function toArray(): array;

    public function hydrate(array $array): StringMapInterface;
}
