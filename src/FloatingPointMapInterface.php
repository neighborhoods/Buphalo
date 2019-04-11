<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

use ArrayAccess;
use Countable;
use SeekableIterator;
use Serializable;

interface FloatingPointMapInterface extends SeekableIterator, ArrayAccess, Serializable, Countable
{
    /** @param float ...$floatingPoints */
    public function __construct(array $floatingPoints = array(), int $flags = 0);

    public function offsetGet($index): float;

    /** @param float $floatingPoint */
    public function offsetSet($index, $floatingPoint);

    /** @param float $floatingPoint */
    public function append($floatingPoint);

    public function current(): float;

    public function getArrayCopy(): FloatingPointMapInterface;

    public function toArray(): array;

    public function hydrate(array $array): FloatingPointMapInterface;
}
