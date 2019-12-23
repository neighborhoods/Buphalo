<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1;

use ArrayAccess;
use Countable;
use SeekableIterator;
use Serializable;

interface IntegerMapInterface extends SeekableIterator, ArrayAccess, Serializable, Countable
{
    /** @param int ...$integers */
    public function __construct(array $integers = [], int $flags = 0);

    public function offsetGet($index): int;

    /** @param int $integer */
    public function offsetSet($index, $integer);

    /** @param int $integer */
    public function append($integer);

    public function current(): int;

    public function getArrayCopy(): IntegerMapInterface;

    public function toArray(): array;

    public function hydrate(array $integers): IntegerMapInterface;
}
