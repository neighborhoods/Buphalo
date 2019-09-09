<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

use ArrayAccess;
use Countable;
use SeekableIterator;
use Serializable;

interface BooleanMapInterface extends SeekableIterator, ArrayAccess, Serializable, Countable
{
    /** @param bool ...$booleans*/
    public function __construct(array $booleans = array(), int $flags = 0);

    public function offsetGet($index): bool;

    /** @param bool $integer */
    public function offsetSet($index, $integer);

    /** @param bool $boolean */
    public function append($boolean);

    public function current(): bool;

    public function getArrayCopy(): BooleanMapInterface;

    public function toArray(): array;

    public function hydrate(array $booleans): BooleanMapInterface;
}
