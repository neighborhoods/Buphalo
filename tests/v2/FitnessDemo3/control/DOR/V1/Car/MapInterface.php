<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car;

use ArrayAccess;
use Countable;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\CarInterface;
use SeekableIterator;
use Serializable;

interface MapInterface extends SeekableIterator, ArrayAccess, Serializable, Countable
{
    /** @param CarInterface ...$Cars */
    public function __construct(array $Cars = array(), int $flags = 0);

    public function offsetGet($index): CarInterface;

    /** @param CarInterface $Car */
    public function offsetSet($index, $Car);

    /** @param CarInterface $Car */
    public function append($Car);

    public function current(): CarInterface;

    public function getArrayCopy(): MapInterface;

    public function toArray(): array;

    /** @param CarInterface ...$Cars */
    public function hydrate(array $Cars): MapInterface;
}
