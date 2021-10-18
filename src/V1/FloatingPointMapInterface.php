<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1;

use ArrayAccess;
use Countable;
use SeekableIterator;
use Serializable;

interface FloatingPointMapInterface extends SeekableIterator, ArrayAccess, Serializable, Countable
{
    /** @param float ...$floatingPoints */
    public function __construct(array $floatingPoints = [], int $flags = 0);

    public function offsetGet($index): float;

    /** @param float $floatingPoint */
    public function offsetSet($index, $floatingPoint): void;

    /** @param float $floatingPoint */
    public function append($floatingPoint): void;

    public function current(): float;

    public function getArrayCopy(): FloatingPointMapInterface;

    public function toArray(): array;

    public function hydrate(array $array): FloatingPointMapInterface;
}
