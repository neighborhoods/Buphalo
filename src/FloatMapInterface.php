<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

interface FloatMapInterface extends \SeekableIterator, \ArrayAccess, \Serializable, \Countable
{
    /** @param float ...$float */
    public function __construct(array $float = array(), int $flags = 0);

    public function offsetGet($index): float;

    /** @param float $float */
    public function offsetSet($index, $float);

    /** @param float $float */
    public function append($float);

    public function current(): float;

    public function getArrayCopy(): FloatMapInterface;

    public function toArray(): array;

    public function hydrate(array $array): FloatMapInterface;
}
