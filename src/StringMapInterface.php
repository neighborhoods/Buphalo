<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

use ArrayAccess;
use Countable;
use SeekableIterator;
use Serializable;

interface StringMapInterface extends SeekableIterator, ArrayAccess, Serializable, Countable
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

    /** @param string ...$Strings */
    public function hydrate(array $Strings): StringMapInterface;
}
