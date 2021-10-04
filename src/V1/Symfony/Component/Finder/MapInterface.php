<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Symfony\Component\Finder;

use ArrayAccess;
use Countable;
use SeekableIterator;
use Serializable;
use Symfony\Component\Finder\Finder;

/** @codeCoverageIgnore */
interface MapInterface extends SeekableIterator, ArrayAccess, Serializable, Countable
{
    /** @param Finder ...$finders */
    public function __construct(array $finders = [], int $flags = 0);

    public function offsetGet($index): Finder;

    /** @param Finder $finder */
    public function offsetSet($index, $finder): void;

    /** @param Finder $finder */
    public function append($finder): void;

    public function current(): Finder;

    public function getArrayCopy(): MapInterface;

    public function toArray(): array;

    public function hydrate(array $array): MapInterface;
}
