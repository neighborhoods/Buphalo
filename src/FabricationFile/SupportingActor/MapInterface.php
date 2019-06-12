<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\SupportingActor;

use ArrayAccess;
use Countable;
use Neighborhoods\Bradfab\FabricationFile\SupportingActorInterface;
use SeekableIterator;
use Serializable;

interface MapInterface extends SeekableIterator, ArrayAccess, Serializable, Countable
{
    /** @param SupportingActorInterface ...$Actors */
    public function __construct(array $Actors = array(), int $flags = 0);

    public function offsetGet($index): SupportingActorInterface;

    /** @param SupportingActorInterface $Actor */
    public function offsetSet($index, $Actor);

    /** @param SupportingActorInterface $Actor */
    public function append($Actor);

    public function current(): SupportingActorInterface;

    public function getArrayCopy(): MapInterface;

    public function toArray(): array;

    public function hydrate(array $Actors): MapInterface;
}
