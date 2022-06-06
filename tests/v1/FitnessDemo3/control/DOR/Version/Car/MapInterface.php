<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Car;

use ArrayAccess;
use Countable;
use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\CarInterface;
use SeekableIterator;
use Serializable;

interface MapInterface extends SeekableIterator, ArrayAccess, Serializable, Countable
{
    /** @param CarInterface ...$Cars */
    public function __construct(array $Cars = array(), int $flags = 0);

    public function offsetGet($index): CarInterface;

    /** @param CarInterface $Car */
    public function offsetSet($index, $Car): void;

    /** @param CarInterface $Car */
    public function append($Car): void;

    public function current(): CarInterface;

    public function getArrayCopy(): MapInterface;

    public function toArray(): array;

    /** @param CarInterface ...$Cars */
    public function hydrate(array $Cars): MapInterface;
}
