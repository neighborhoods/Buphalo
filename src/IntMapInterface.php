<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

interface IntMapInterface extends \SeekableIterator, \ArrayAccess, \Serializable, \Countable
{
    /** @param int ...$int */
    public function __construct(array $int = array(), int $flags = 0);

    public function offsetGet($index): int;

    /** @param int $int */
    public function offsetSet($index, $int);

    /** @param int $int */
    public function append($int);

    public function current(): int;

    public function getArrayCopy(): IntMapInterface;

    public function toArray(): array;

    public function hydrate(array $array): IntMapInterface;
}
