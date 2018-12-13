<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\SupportingActor;

use Rhift\Bradfab\FabricationFile\SupportingActorInterface;

interface MapInterface extends \SeekableIterator, \ArrayAccess, \Serializable, \Countable
{
    /** @param SupportingActorInterface ...$SupportingActors */
    public function __construct(array $SupportingActors = array(), int $flags = 0);

    public function offsetGet($index): SupportingActorInterface;

    /** @param SupportingActorInterface $SupportingActor */
    public function offsetSet($index, $SupportingActor);

    /** @param SupportingActorInterface $SupportingActor */
    public function append($SupportingActor);

    public function current(): SupportingActorInterface;

    public function getArrayCopy(): MapInterface;

    public function toArray(): array;

    public function hydrate(array $array): MapInterface;
}
