<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\PrimaryActorName;

use ArrayAccess;
use Countable;
use Neighborhoods\BuphaloTemplateTree\PrimaryActorNameInterface;
use SeekableIterator;
use Serializable;

interface MapInterface extends SeekableIterator, ArrayAccess, Serializable, Countable
{
    /** @param PrimaryActorNameInterface ...$PrimaryActorNames */
    public function __construct(array $PrimaryActorNames = array(), int $flags = 0);

    public function offsetGet($index): PrimaryActorNameInterface;

    /** @param PrimaryActorNameInterface $PrimaryActorName */
    public function offsetSet($index, $PrimaryActorName): void;

    /** @param PrimaryActorNameInterface $PrimaryActorName */
    public function append($PrimaryActorName): void;

    public function current(): PrimaryActorNameInterface;

    public function getArrayCopy(): MapInterface;

    public function toArray(): array;

    /** @param PrimaryActorNameInterface ...$PrimaryActorNames */
    public function hydrate(array $PrimaryActorNames): MapInterface;
}
